<?php
/****************************~core MVC~***********************************/
/*~ Librería de clase proyecto core MVC
/*~ Controlador.php
/*~ Autor: Gallo Rodrigo Nicolas. RGweb.com.ar
/****************************~core MVC~***********************************/
namespace core\clases;
use core\clases\Route as Route;

class Controlador{
    
    /*el controlador que ejecuta las vistas*/
    private $vista;
    
    /*el enrutador que saca la ruta de la url (clase Route.php)*/
    private $router;
    
    /*la ruta solicitada*/
    private $routerequest;
    
    /*parámetros en la url con ??*/
    private $parameters;
    
    /*parámetros amigables en la url*/
    private $frindly_parameters;
    
    public function __construct(){
        $this->router = new Route(false);
        $this->routerequest = $this->router ->getRoutes();
        $this->parameters = array();
        $this->frindly_parameters = array();
        
        if (is_array($this->routerequest[0])){
            $this->parameters = $this->routerequest[0];   
        }
        
        if (isset($this->routerequest['friendly_parameters'])){
            $this->frindly_parameters = $this->routerequest['friendly_parameters'];
        }
        
        $this->SerchRoute($this->routerequest);
        $this->Error404();
    }

   
    private function SerchRoute($route){
        if (!is_file(CONFIG.'routes.php')){
            exit('No se encontro el archivo config');
        }
        require CONFIG.'routes.php';
        $this->routerequest = $route;
        
        if (isset ($this->routerequest[1])){
            foreach ($routes_controlador as $ruta => $controladores){
                if ($ruta == $this->routerequest[1]){
                    foreach ($controladores as $controlador => $accion){
                        if (!is_file(CONTROLLERS.$controlador.'.php')){
                            exit('No se encontro el controlador'.$controlador);
                        }
                        $controlador_objeto = new $controlador();
                        if(!method_exists($controlador_objeto, $accion)){
                            exit('No se encontro el método: '.$accion.', Dentro del controlador: '.$controlador);
                        }
                        $this->ExecuteRouteController($controlador_objeto, $accion);
                        die;
                    }
                }
            }
        }
    }
    
    private function ExecuteRouteController($controlador, $route){
        $total_parameters = array_merge($this->parameters, $this->frindly_parameters);
        call_user_func_array(array($controlador, $route), [$total_parameters]);
    }
    
    
    private function Error404(){
        header("HTTP/1.0 404 Not Found");
        \ViewController::Error404();
        die;
    }
    
    
}
