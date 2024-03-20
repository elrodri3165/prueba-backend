<?php
/****************************~core MVC~***********************************/
/*~ Librería de clase proyecto core MVC
/*~ WebMaker.php
/*~ Autor: Gallo Rodrigo Nicolas. RGweb.com.ar
/****************************~core MVC~***********************************/
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