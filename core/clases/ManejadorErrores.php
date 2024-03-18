<?php
/****************************~WebMaker core MVC~************************************/
/*~ Librería de clase proyecto WebMaker
/*~ ManejnadorErrores.php
/*~ VERSION 2.0
/*~ 29/12/2023
/*~ Autor: Gallo Rodrigo Nicolas. RGweb.com.ar

COMENTARIOS
29/12/2023 se hizo la clase nueva. 

/****************************~WebMaker core MVC~************************************/
namespace core\clases;


class ManejadorErrores extends \Exception {
    
    protected $code;
    protected $message;

    
    public function __construct($message = "", $code = 0, Throwable $previous = null) {
        if(ERRORES_PERSONALIZADOS == true){
            parent::__construct($message, $code, $previous);
            $this->code = $code;
            $this->message = $message;
        }
    }

    public function customErrorDetails() {
        
        if (ERRORES_POR_CONSOLAJS == true){
            echo "<script> console.log('nivel de error: $this->code - mensaje: $this->message')</script><br>";
        }else{
            echo "<br><strong> $this->code</strong><br> $this->message <hr>";
        }
        
        return "Error personalizado: [{$this->code}] {$this->message}";
    }
}