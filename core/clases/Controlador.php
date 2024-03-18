<?php
/****************************~WebMaker core MVC~************************************/
/*~ Librería de clase proyecto WebMaker
/*~ Controlador.php
/*~ VERSION 4.1
/*~ 21/02/2022
/*~ Autor: Gallo Rodrigo Nicolas. RGweb.com.ar

COMENTARIOS
4.1 correccion de error en php 8, cambio de sintaxis de call_user_func_array
MEJORA DEL CONTROLADOR.
BUSCA PARÁMETROS TANTO AMIGABLES COMO CON ? Y LOS ENVIA COMO TAL AL MÉTODO SOLICITADO POR LA RUTA.
AHORA EN LA RUTA SE PUEDE SELECCIONAR DISTINTOS CONTROLADORES (PUEDEN CREARSE NUEVOS) CON SUS RESPECTIVOS
MÉTODOS.

ESTA CLASE ES LA QUE CON LA AYUDA DE LA CLASE ROUTER
BUSCA LA RUTA EN EL ARCHIVO ROUTES.PHP Y EJECUTA LA FUNCION
CORRESPONDIENTE EN LA VISTA.

/****************************~WebMaker core MVC~************************************/

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

    public function __destruct(){
        
    }
        
    private function SerchRoute($route){
        require CONFIG.'routes.php';
        $this->routerequest = $route;
        
        if (isset ($this->routerequest[1])){
            foreach ($routes_controlador as $ruta => $controladores){
                if ($ruta == $this->routerequest[1]){
                    foreach ($controladores as $controlador => $accion){
                        if (!is_file(CONTROLADORES.$controlador.'.php')){
                            exit('No se encontro el controlador'.$controlador);
                        }
                        $controlador_objeto = new $controlador();
                        if(!method_exists($controlador_objeto, $accion)){
                            exit('No se encontro el método: '.$accion.', Dentro del controlador: '.$controlador);
                        }
                        $this->ExecuteRouteControlador($controlador_objeto, $accion);
                        die;
                    }
                }
            }
        }
    }
    
    
    /*FUNCION PARA BUSCAR RUTAS EN LA BASE DE DATOS*/
    private function SearchRouteDB($route){
        $this->routerequest = $route[1];
        
        $tabla = 'setear tabla';
        $nombre = 'setear el campo';
            
        $conexion = new AppDB();
        $query = "SELECT $nombre FROM $tabla WHERE route = '$this->routerequest'";
        $resultado = $conexion ->EjecutaqueryDB($query);
        
        if ($resultado == false){
            return false;
        }else{
            $this->ExecuteRouteControlador('ruta a ejecutar', $this->routerequest);
            die;
        }
    }
    

    private function ExecuteRouteControlador($controlador, $route){
        $total_parameters = array_merge($this->parameters, $this->frindly_parameters);
        call_user_func_array(array($controlador, $route), [$total_parameters]);
    }
    
    
    private function Error404(){
        $this->vista = new ControladorVista();
        header("HTTP/1.0 404 Not Found");
        $this->ExecuteRouteControlador('ControladorVista','Error404');
        die;
    }
    
    
}
