<?php
/*DATOS DE CONFIGURACION DEL PROYECTO*/
date_default_timezone_set           ('America/Argentina/Buenos_Aires');
setlocale(LC_TIME                   ,'es_ES.UTF8');

ini_set('display_error'             ,1);
ini_set('display_startup'           ,1);
error_reporting                     (E_ALL);
/*FIN DATOS DE CONFIGURACION DEL PROYECTO*/

define('VERSION'                    , '1.0');
define('SERVER'                     ,$_SERVER['SERVER_NAME']);
define('APP_NOMBRE'                 ,'PruebaBackEnd');
define('DS'                         , DIRECTORY_SEPARATOR);
define('ROOT'                       , getcwd().DS);
define('APP'                        , ROOT.'core'.DS);
define('CLASSES'                    , APP.'clases'.DS);
define('CONTROLLERS'                , ROOT.'controllers'.DS);
define('MODELS'                     , ROOT.'models'.DS);
define('CONFIG'                     , ROOT.'config'.DS);


/******CONFIGURACION DE GESTION DE ERRORES*********/
define ("ERRORES_POR_CONSOLAJS"     ,true);
define ("ERRORES_PERSONALIZADOS"    ,true);
/******CONFIGURACION DE GESTION DE ERRORES*********/

define ('URL'                       ,'http://localhost:8080/');

/*************************************DATABASE*************************************************/ 
/*CONTSTANES DE CONEXION DB*/
define('SERVIDOR'                   ,'mariadb');
define('USUARIO'                    ,'prueba_web');
define('CLAVE'                      ,'123456');
define('BASE'                       ,'prueba');
/*************************************DATABASE*************************************************/