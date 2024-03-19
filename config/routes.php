<?php

$routes_controlador = [
    
    "" => [
        "ViewController" => "Index"
    ],
    "/" => [
        "ViewController" => "Index"
    ],
    "index" => [
        "ViewController" => "Index"
    ],



    /*RUTAS DE ENDPOINTS*/
    /*CREATE USER*/
    "create-user" => [
        "LogicController" => "CreateUser"
    ],

    /*READ USERS*/
    "read-users" => [
        "LogicController" => "ReadUsers"
    ],

    /*UPDATE USER*/
    "update-user" => [
        "LogicController" => "UpdateUser"
    ],

    /*DELETE USER*/
    "delete-user" => [
        "LogicController" => "DeleteUser"
    ],
    
];