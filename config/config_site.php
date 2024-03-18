<?php

/*DATOS DE CONFIGURACION DEL PROYECTO*/
date_default_timezone_set           ('America/Argentina/Buenos_Aires');
setlocale(LC_TIME                   ,'es_ES.UTF8');

ini_set('display_error'             ,1);
ini_set('display_startup'           ,1);
error_reporting                     (E_ALL);
/*FIN DATOS DE CONFIGURACION DEL PROYECTO*/

/*CONSTANTES*/
define ('MANTENIMIENTO'             , false);
define ('PRODUCCION'                , false);
define ('VERSION'                   , '1.0');

/*VERSION DEL PROYECTO*/

define ('SERVER'                    ,$_SERVER['SERVER_NAME']);

define('VERSION_VM'                 ,'7.0'); /*ACTUALIZADA el 29/12/2023**/
define('APP_NOMBRE'                 ,'WebMaker');

define('DS'                         , DIRECTORY_SEPARATOR);
define('ROOT'                       , getcwd().DS);
define('APP'                        , ROOT.'core'.DS);
define('CLASSES'                    , APP.'clases'.DS);
define('MODELOS'                    , ROOT.'modelos'.DS);
define('CONTROLADORES'              , ROOT.'controladores'.DS);
define('CONFIG'                     , ROOT.'config'.DS);


/******CONFIGURACION DE GESTION DE ERRORES*********/
define ("ERRORES_POR_CONSOLAJS"     ,true);
define ("ERRORES_PERSONALIZADOS"    ,true);
/******CONFIGURACION DE GESTION DE ERRORES*********/

/*FIN CONSTANTES*/

/************************************AMBIENTE DE PRODUCCION***********************************************/
if (PRODUCCION){
     /*URL PARA RUTAS*/
     define ('URL'                  ,'http://localhost:8080/'); //DEFINIR!
    
     /*CONTSTANES DE CONEXION DB PRUDUCCION*/
     define('SERVIDOR'              ,'localhost:8081');
     define('USUARIO'               ,'');
     define('CLAVE'                 , '');
     define('BASE'                  ,'prueba');
}
/************************************AMBIENTE DE PRODUCCION***********************************************/

/*************************************AMBIENTE DE TESTING*************************************************/
else{
    define ('URL'                   ,'http://localhost:8080/'); //DEFINIR!
    
    /*CONTSTANES DE CONEXION DB*/
    define('SERVIDOR'               ,'localhost:8081');
    define('USUARIO'                ,'prueba_web');
    define('CLAVE'                  , '12345');
    define('BASE'                   ,'prueba_web');   
}
/*************************************AMBIENTE DE TESTING*************************************************/
