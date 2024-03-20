<?php
/****************************~core MVC~***********************************/
/*~ Librería de clase proyecto core MVC
/*~ Template.php
/*~ Autor: Gallo Rodrigo Nicolas. RGweb.com.ar
/****************************~core MVC~***********************************/

namespace core\clases;

class Template{
    
    private $directorio; //el directorio donde estan las templates
    private $contenido; //aca almaceno el contenido de un template
    private $patron = "/\{[a-zA-Z0-9-_]+\}/";
    
    private $error; //almaceno el error
    
    
    public function __construct($directorio=null){
        if ($directorio != null){
            if(is_dir($directorio)){
                $this->directorio = $directorio;
            }else{
                $this->error = 'No es un directorio válido';
            }
        } 
    }
    
    
    public function CargarArchivo($archivo){
        $ruta = $this->directorio."/".$archivo;
        if (is_file($ruta)){
            $this->contenido = file_get_contents($ruta);
        }else{
            $this->error = 'No es un archivo válido'.$archivo;
        }
    }
    
    public function Mostrar(){
        $this->EliminarVariablesVacias();
        //echo $this->contenido;
    }
    
    public function CargarVariable($variable, $valor){
        if ($valor == null){
            $valor = "";
        }
        $this->contenido = str_replace("{".$variable."}", $valor, $this->contenido);
    }
    
    
    private function EliminarVariablesVacias(){
        echo preg_replace($this->patron, "", $this->contenido);
    }
    
    public function CargarPlantilla($variable, $archivo){
        $ruta = $this->directorio."/".$archivo;
        if (is_file($ruta)){
            $contenidoparcial = file_get_contents($ruta);
            $this->CargarVariable($variable, $contenidoparcial);
        }else{
            $this->error = 'No es un archivo válido  ->'.$archivo;
            echo $this->error;
        }    
    }
    
    public function VaciarContenido(){
        preg_replace($this->patron, "", $this->contenido);
        return $this->contenido;
    }
    
}