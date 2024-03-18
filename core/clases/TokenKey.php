<?php
/****************************~WebMaker core MVC~************************************/
/*~ Librería de clase proyecto WebMaker
/*~ TokenKey.php
/*~ VERSION 2.0
/*~ 21/02/2022
/*~ Autor: Gallo Rodrigo Nicolas. RGweb.com.ar

COMENTARIOS
Generador de tokenkey, 
Luego de instanciar el objeto con al fucion GetToken() se genera el token.
por defecto se genera un token de 40 caracteres de largo, o sea  genera un token
de 20 letras y 20 numeros mezclados aleatoriamente.
Si se pasa un valor por parametro al constructor de objeto el token tomara ese largo 
total, o sea la mitad para letras y la mitad para numeros, tambien mezclados una letra
y un numero aleatoriamente.

si se desea que legth sea el largo para letras + numeros agregar comentario de  esta sentencia 
del constructor ---->>> $this->length = $this->length /2 o eliminarla del constructor.

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