<?php
/*
CLASE VISTA.
ARAMAR ACA LAS DISTINTAS VISTAS, CON LA AYUDA DE LA CLASE TEMPLATE.
*/
use core\clases\Template as Template;

class ControladorVista{
    
    private $template;
    
    public function __construct(){
        $this->template = new Template('templates');
        $this->template ->CargarArchivo('html_basica.php');
        $this->template ->CargarPlantilla('head', 'head.php');
    }
    
    public function __destruct(){
        $this->template -> CargarVariable('ruta',URL);
        $this->template -> CargarVariable('version',VERSION);
        $this->template->Mostrar();
    }
    public static function Error404(){
        $template = new Template('templates');
        $template ->CargarArchivo('html_basica.php');
        $template ->CargarPlantilla('head', 'head.php');
        $template ->CargarPlantilla('body1','404.php');
        $template ->CargarVariable('ruta',URL);
        $template ->CargarVariable('version',VERSION);
        $template->Mostrar();
    }
    
    
    /*PARA PASAR PARÁMETROS EN LOS MÉTODOS, SE SUGIERE PONER UN VALOR
    POR DEFECTO DE CADA VARIABLE, PARA EVITAR ERRORES CUANDO LA URL VA SIN
    PARÁMETROS*/
    public function Index(){
        $this->template ->CargarPlantilla('body1','index.php');
        
        $obj = new users();
        
        $res = $obj ->Buscar();
    }
    
    
    public function Admin(){
        $this->template ->CargarPlantilla('body1','admin.php');
    }
    
    public function RegistrarUsuario(){
        $this->template ->CargarPlantilla('body1','registrar.php');
    }
    
    
    public function Login(){
        if (isset($_SESSION['user'])){
            WebMaker::ValidateUser();
            //funcion usada para validar usuarios
            $usuario =  $_SESSION['user']->DevolverUserDB();
            
            //genero el token
            WebMaker::StartToken();
                        
            $this->template ->CargarPlantilla('body1','login.php');
            $this->template -> CargarVariable('usuario',$usuario);
            $this->template -> CargarVariable('token', $_SESSION['token']);
        }else{
            WebMaker::ReDirect('index');
        }
    }
}
