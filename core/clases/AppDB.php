<?php
/****************************~WebMaker core MVC~************************************/
/*~ Librería de clase proyecto WebMaker
/*~ AppDB.php
/*~ VERSION 3.0
/*~ 29/12/2023
/*~ Autor: Gallo Rodrigo Nicolas. RGweb.com.ar

COMENTARIOS
MEJORA AL CREAR EL OBJETO, SE MANTIENE UNA SOLA CONEXION PARA TODO EL PROYECTO.
27/10/2023 se mejoro la conexion en el objeto ConectorDB, se quito la variable 
global.
06/11/2023 se mejoro la subsanacion
29/12/2023 se dividiron las funciones, como en conector DB

/****************************~WebMaker core MVC~************************************/
namespace core\clases;
use core\clases\ConectorDB as ConectorDB;
use core\clases\ManejadorErrores as ManejadorErrores;


class AppDB extends ConectorDB{
    
    protected $conexion;
    protected $query;
    protected $resultado;
    
    public function __construct(){
        $this->conexion = ConectorDB::Conectar(SERVIDOR, USUARIO, CLAVE, BASE);
    }
    

    public function Select($query){
        return $this->conexion->Select($query);
    }
    
    public function Insert($query){
        return $this->conexion->Insert($query);
    }
    
    public function UpdateDelete($query){
        return $this->conexion->UpdateDelete($query);
    }

    public function SubSanarString($string){
        return $this-> conexion ->Subsanar($string);
    }
}