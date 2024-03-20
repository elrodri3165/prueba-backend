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
    "crud-users" => [
        "ViewController" => "CrudUsers"
    ],
    "crud-user-comments" => [
        "ViewController" => "CrudUserComments"
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
    "create-user-comment" => [
        "LogicController" => "CreateUserComment"
    ],
    /*READ USERS_COMMENT*/
    "read-user-comments" => [
        "LogicController" => "ReadUserComments"
    ],
    /*UPDATE USER_COMMENT*/
    "update-user-comment" => [
        "LogicController" => "UpdateUserComment"
    ],
    /*DELETE USER_COMMENT*/
    "delete-user-comment" => [
        "LogicController" => "DeleteUserComment"
    ],
    /*****************RUTAS DE ENDPOINTS*****************/
];