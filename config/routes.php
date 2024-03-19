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



    /*****************RUTAS DE ENDPOINTS*****************/
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

    

    /*CREATE USER_COMMENT*/
    "create-user_comment" => [
        "LogicController" => "CreateUserComment"
    ],
    /*READ USERS_COMMENT*/
    "read-users_comment" => [
        "LogicController" => "ReadUserComments"
    ],
    /*UPDATE USER_COMMENT*/
    "update-user_comment" => [
        "LogicController" => "UpdateUserComment"
    ],
    /*DELETE USER_COMMENT*/
    "delete-user_comment" => [
        "LogicController" => "DeleteUserComment"
    ],
    /*****************RUTAS DE ENDPOINTS*****************/
];