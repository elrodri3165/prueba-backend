<?php
use core\clases\WebMaker;

class LogicController{

    private $result;
    
    public function __construct()
    {   
        WebMaker::ValidateToken();
        $result = null;
    }

    public function __destruct()
    {
        if($this->result != null){
            //acciones si esta ok
        }else{
            //acciones si falló
        }
    }
    
    public function CreateUser()
    {
        if(isset($_POST['fullname'], $_POST['email'], $_POST['pass'], $_POST['openid'])){
            $user = new \user();

            $user->setFullname($_POST['fullname']);
            $user->setEmail($_POST['email']);
            $user->setPass($_POST['pass']);
            $user->setOpenid($_POST['openid']);

            $this->result = $user ->Guardar();
        }
    }
    

    public function UpdateUser()
    {
        if(isset($_POST['id'], $_POST['fullname'], $_POST['email'], $_POST['pass'], $_POST['openid'])){
            $user = new \user();

            $user->setId($_POST['id']);
            $user->setFullname($_POST['fullname']);
            $user->setEmail($_POST['email']);
            $user->setPass($_POST['pass']);
            $user->setOpenid($_POST['openid']);

            $this->result = $user ->Actualizar('id');
        }
    }
    
    public function DeleteUser()
    {
        if(isset($_POST['id'], $_POST['fullname'], $_POST['email'], $_POST['pass'], $_POST['openid'])){
            //falta la lógica de eliminar
        }
    }
    
    
    
}