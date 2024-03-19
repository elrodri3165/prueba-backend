<?php
use core\clases\WebMaker;
use models\user;
use models\user_comment;

class LogicController{

    private $result;
    
    public function __construct()
    {   
        //WebMaker::ValidateToken();
        $result = null;
    }

    public function __destruct()
    {
        if($this->result != null){
            echo json_encode($this->result);
        }else{
            echo json_encode(null);
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
    
    public function ReadUsers()
    {   
        $user = new \user();
        $this->result = $user ->Buscar();
    }
    
}