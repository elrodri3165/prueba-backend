<?php 
/****************************~core MVC~***********************************/
/*~ Librería de clase proyecto core MVC
/*~ Autoloader.php
/*~ Autor: Gallo Rodrigo Nicolas. RGweb.com.ar
/****************************~core MVC~***********************************/
namespace core\clases;

class Autoloader
{
  /**
   * Método encargado de ejecutar el autocargador de forma estática
   *
   * @return void
   */
  public static function init()
  {
    spl_autoload_register([__CLASS__, 'autoload']);
  }

  private static function autoload($class_name)
  {
    if(is_file(CONTROLLERS.$class_name.'.php'))
    {
      require_once CONTROLLERS.$class_name.'.php';
    }
    if(is_file(MODELS.$class_name.'.php'))
    {
      require_once MODELS.$class_name.'.php';
    }
    if (file_exists(str_replace('\\', '/', $class_name).'.php'))
    {
      require_once str_replace('\\', '/', $class_name).'.php';
    }
    return;
  }
}