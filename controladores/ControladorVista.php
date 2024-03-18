<?php

use core\clases\Template;

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
    
    
    public function Index(){
    
    }
    
    
    
    
    
}
