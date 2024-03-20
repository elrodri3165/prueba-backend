<?php
/****************************~core MVC~***********************************/
/*~ Librería de clase proyecto core MVC
/*~ ManejadorErrores.php
/*~ Autor: Gallo Rodrigo Nicolas. RGweb.com.ar
/****************************~core MVC~***********************************/
namespace core\clases;


class ManejadorErrores extends \Exception {
    
    protected $code;
    protected $message;

    
    public function __construct($message = "", $code = 0, \Throwable $previous = null) {
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