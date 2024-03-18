<?php
/****************************~WebMaker core MVC~************************************/
/*~ Librería de clase proyecto WebMaker
/*~ TokenKey.php
/*~ VERSION 2.0
/*~ 21/02/2022
/*~ Autor: Gallo Rodrigo Nicolas. RGweb.com.ar

/****************************~WebMaker core MVC~************************************/


namespace core\clases;

class TokenKey{
    
    private $length;
    private $letras;
    private $numeros;
    private $token;
    
    
    
    function __construct($length=40){
        $this->length = intval($length);
        $this->length = $this->length /2;
        $this ->letras = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $this -> numeros = "0123456789";
    }
    
    
    
    private function CrearToken(){
        $i = 0;
        while ($i< $this->length){
            $this->token .= $this->letras[rand(0, 51)].$this->numeros[rand(0, 9)];
            $i++;
        }
        return $this->token;
    }
    
    
    public function GetToken(){
        $this->CrearToken();
        return $this->token;
    }   
}