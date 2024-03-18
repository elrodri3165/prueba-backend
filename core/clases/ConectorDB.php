<?php
/****************************~WebMaker core MVC~************************************/
/*~ Librería de clase proyecto WebMaker
/*~ ConectorDB.php
/*~ VERSION 4.0
/*~ 29/12/2023
/*~ Autor: Gallo Rodrigo Nicolas. RGweb.com.ar

COMENTARIOS
LIBRERIA DE CONEXION A LA BASE DE DATOS WM
27/10/2023 se modifico para tener una misma conexion en todo el proyecto,
pese a que el objeto se instancie muchas veces
06/11/2023 se mejoro la subsanacion
29/12/2023 se divieron las funciones de busqueda, insert o update delete.
se agrego manejo de excepciones con try catch.
/****************************~WebMaker core MVC~************************************/

namespace core\clases;

class ConectorDB{
    private static $instancia;
    private $conexion;
    public $error;

    private function __construct($servidor, $usuario, $clave, $base) { 
        try {
            $this->conexion = new \mysqli($servidor, $usuario, $clave, $base);
        } catch (\mysqli_sql_exception $e) {
            // Manejar la excepción de tipo mysqli_sql_exception
            $this->error();
            $this->manejarExcepcion($e);
            return false;
        } catch (\Exception $e) {
            // Manejar otras excepciones generales
            $this->error();
            $this->manejarExcepcion($e);
            return false;
        }
    }

    public function __destruct(){
        if ($this->conexion != null && !$this->conexion->connect_errno) {
            $this->conexion->close();
        } elseif ($this->conexion != null) {
            $this->error();
        }
    }
    
    public static function Conectar($servidor, $usuario, $clave, $base) {
        if (self::$instancia === null) {
            self::$instancia = new self($servidor, $usuario, $clave, $base);
        }
        return self::$instancia;
    }

    /**************************ERROR******************************/
    protected function manejarExcepcion(\Exception $e) {
        // Aquí puedes personalizar cómo manejar la excepción
        // Por ejemplo, podrías loggearla, enviar un correo electrónico, etc.
        echo "Error: " . $e->getMessage();
    }

    private function error() {
        if($this->conexion != null && $this->conexion->connect_error == null){
            $this->error = $this->conexion->error;
            throw new ManejadorErrores($this->error, 500); // 500 es un código de error personalizado   
        }
    }
    /**************************SERROR******************************/

    public function Subsanar($string){
        return $this ->conexion -> real_escape_string($string);
    }
    
    
    private function _connect($servidor, $usuario, $clave, $base){
        if(!isset($this->conexion)){
            $this-> conexion = new \mysqli ($servidor, $usuario, $clave, $base);
        }
        if($this->conexion->connect_errno){
            $this->error();
            return false;
        }    
    }

    /**************************SELECT*****************************/
    protected function Select($query){
        try {
            if($this->conexion != null){
                if (!$this->conexion->connect_errno){
                    /*********NUCLEO DE LA FUNCION********/
                    $resultado = $this->conexion->query($query);
                    if($resultado){
                        $array_resultado = null;

                        if($resultado->num_rows > 0){
                            while ($fila = $resultado->fetch_assoc()){
                                $array_resultado[] = $fila;
                            }
                        }

                        return $array_resultado;
                    } else {
                        $this->error();
                        return false;
                    }
                    /*********NUCLEO DE LA FUNCION********/
                }
            }
        } catch (\Exception $e) {
            // Manejar la excepción
            $this->manejarExcepcion($e);
            return false;
        }
    }
    /**************************SELECT*****************************/
    
    
    /**************************INSERT*****************************/
    protected function Insert($query){
        try {
            if($this->conexion != null){
                if (!$this->conexion->connect_errno){
                    /*********NUCLEO DE LA FUNCION********/
                    $resultado = $this->conexion->query($query);
                    if($resultado){
                        return $this->conexion->insert_id;
                    } else{
                        $this->error();
                        return false;
                    } 
                    /*********NUCLEO DE LA FUNCION********/
                }
            }
        } catch (\Exception $e) {
            // Manejar la excepción
            $this->manejarExcepcion($e);
            return false;
        }
    }
    /**************************INSERT*****************************/
    
    /*********************UPDATE OR DELETE************************/
    protected function UpdateDelete($query){
        try {
            if($this->conexion != null){
                if (!$this->conexion->connect_errno){
                    /*********NUCLEO DE LA FUNCION********/
                    $resultado =$this ->conexion->query($query);
                    if($resultado){
                        return $this->conexion->affected_rows;
                    }else{
                        $this->error();
                        return false;
                    }
                    /*********NUCLEO DE LA FUNCION********/
                }
            }
        } catch (\Exception $e) {
            // Manejar la excepción
            $this->manejarExcepcion($e);
            return false;
        }
    }
    /*********************UPDATE OR DELETE************************/
}