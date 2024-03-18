<?php
/****************************~WebMaker core MVC~************************************/
/*~ Librería de clase proyecto WebMaker
/*~ WebMaker.php
/*~ VERSION 3.0
/*~ 29/12/2023
/*~ Autor: Gallo Rodrigo Nicolas. RGweb.com.ar

COMENTARIOS
Clase ejecutora de core WebMaker
29/12/2023 se agrego clase personalizada para menejo de excepciones personalizadas, y 
manejo de execpiones en ConectorDB. Se dividieron las fuciones de busqueda, insert o update
delete en AppDB y ConectorDB.
Compatible con PHP 8.2

/****************************~WebMaker core MVC~************************************/


namespace core\clases;

class WebMaker{

    // La función principal que se ejecuta al instanciar nuestra clase
    function __construct() {
        $this->init();
    }

    private function Init_Autoload() {
        require_once CLASSES.'Autoloader.php';
        Autoloader::init();
        return;
    }

    private function Init() {
        // Todos los métodos que queremos ejecutar consecutivamente
        $this->Init_Load_Config();
        $this->Init_Autoload();
        $this->StartSesion();
        $this->StartControlador();
    }

    private function Init_Load_Config() {
        // Carga del archivo de settings inicialmente para establecer las constantes personalizadas
        // desde un comienzo en la ejecución del sitio
        $file = 'config/config_site.php';
        if(!is_file($file)) {
            die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file));
        }
        
        require_once $file;

        return;
    }
    
    private function StartControlador(){
        $controlador = new Controlador();
    }
    
    public static function Start(){
        $webmaker = new self();
        return;
    }
    
    private function StartSesion(){
        session_start();
    }
    
    /********************************************FUNIONES DE TOKEN***************************************************/
    /*
    Void
    GENERAR EL TOKEN ENTRE PANTALLAS
    */
    public static function StartToken(){
        if (isset ($_SESSION['token'], $_SESSION['token_expiration']) && $_SESSION['token_expiration']-time() > 0){
            define('TOKEN', $_SESSION['token']);
            return;
        }
        
        $token = new TokenKey();
        $_SESSION['token'] = $token ->GetToken();
        $_SESSION['token_expiration'] = time() + 300;
        define('TOKEN', $_SESSION['token']);
    }
    /*
    Void
    VALIDAR TOKEN
    */
    public static function ValidateToken(){
        if (isset ($_SESSION['token'], $_POST['token']) && $_POST['token'] === $_SESSION['token']){
            return;
        }
        WebMaker::ReDirect('');
    }
    /********************************************FUNIONES DE TOKEN***************************************************/
    
    
    /***************************************FUNIONES NOTIFICACIONES EN LA SESSION************************************/
     /*FUNCION PARA GENERAR NOTIFICACIONES EN LA SESION*/
    public static function GenerarNotificacion($titulo, $cuerpo, $tipo){
        $array = [
            'titulo' => $titulo,
            
            'cuerpo' => $cuerpo,
            
            'tipo' => $tipo
        ];
        
        $_SESSION['notificacion'] = $array;
    }
    /***************************************FUNIONES NOTIFICACIONES EN LA SESSION************************************/
    
    
    /********************************************FUNIONES DE USUARIOS************************************************/
    /*
    Void
    VALIDAR USUARIOS
    */
    public static function ValidateUser(){
        new CheckuserDB();
    }
    /*Void
    VALIDAR PASS
    */
    public static function ValidarPass($email, $password){
        $resultado = users::GetUserEmailorUser($email);
        
        if($resultado != null){
            $hash = $resultado[0]['password'];
            if (password_verify($password, $hash)){
                return $resultado[0];
            }
        }
        
        return false;
    }
    /********************************************FUNIONES DE USUARIOS************************************************/
    
    /*FUNCIÓN PARA GENERAR CAPTCHA*/
    public static function CAPTCHA($cantidad = 5){
        //se puede usar de las dos formas, (mayúscula o minúscula)
        $token_captcha = new TokenKey($cantidad);
        $_SESSION['captcha'] = $token_captcha ->GetToken();
        $_SESSION['CAPTCHA'] = $token_captcha ->GetToken();
        
        echo $_SESSION['captcha'];
    }
    
    
    /*FUNCIÓN PARA SUBIR ARCHIVOS*/
    /*en name indicar el campo name del imput, y en nombre el nombre del archivo*/
    public static function SubirArchivos($tabla = null, $carpeta = null, $name = 'Foto'){
        $obj = new SubirArchivos($tabla, $carpeta, $name);
        $resultado = $obj ->Subir();
    }
    
    /*FUNCIÓN PARA REDIRECCIONAR RÁPIDAMENTE*/
    public static function ReDirect($destino){
        ob_start();
        $destino = 'Location: '.URL.$destino;
        header ($destino);
        ob_end_flush();
        die;
    }
    
    /*FUNCIÓN PARA REDIRECCIONAR HACIA ATRAS RÁPIDAMENTE*/
    public static function ReDirectBack(){
        $destino = $_SERVER['HTTP_REFERER'];
        ob_start();
        header ($destino);
        ob_end_flush();
        die;;
    }
    
}