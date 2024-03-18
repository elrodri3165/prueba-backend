<?php
/*
VERSION 4.0 MEJORA DE LAS RUTAS. 

DECLARAR LAS RUTAS ACA
NO MODIFICAR EL NOMBRE DE LA VARIABLE

DECLRAR LA RUTA Y EL NOMBRE DE DEL CONTROLADOR
QUE DEBE LLAMAR Y SU MÉTODO. 

SE PUDEN UTILIZAR CONTROLADORES NUEVOS, SOLAMENTE 
SE DEBEN CREAR DENTRO DE LA CARPETA functions/clases
Y SU NOMBRE DEBE SER COMO UNA CLASE. 
EJ. 

MiClase.php --> class MiClase{

}

DE ESTA MANERA SE HACE EL REQUIRE AUTOMÁTICAMENTE.

***UTILIZAR DE ESTA MANENRA ***
"AQUI RUTA" => [
        "CONTROLADOR" => "MÉTODO"
    ],

*/


$routes_controlador = [
    
    "" => [
        "ControladorVista" => "Index"
    ],
    "/" => [
        "ControladorVista" => "Index"
    ],
    "index" => [
        "ControladorVista" => "Index"
    ],
    "admin" => [
        "ControladorVista" => "Admin"
    ],
    "registrar-usuario" => [
        "ControladorVista" => "RegistrarUsuario"
    ],
    

    
    "crear-usuario" => [
        "ControladorLogica" => "CrearUsuario"
    ],
    "cerrar-sesion" => [
        "ControladorLogica" => "CerrarSesion"
    ],
    "validarlogin" => [
        "ControladorLogica" => "ValidarLogin"
    ],
    "subir-archivo" => [
        "ControladorLogica" => "SubirArchivos"
    ],
    
];