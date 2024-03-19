<?php
use core\clases\WebMaker;
use models\user;
use models\user_comment;

class LogicController{

    private $result;
    
    public function __construct()
    {   
        // Permitir solicitudes desde cualquier origen
        header("Access-Control-Allow-Origin: *");
        // Permitir los métodos POST desde cualquier origen
        header("Access-Control-Allow-Methods: POST");
        // Permitir los encabezados Content-Type y X-Requested-With
        header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");
        // Permitir que el navegador envíe cookies a través de CORS
        header("Access-Control-Allow-Credentials: true");
        // Si es una solicitud OPTIONS, terminar la ejecución del script
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            exit();
        }
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
   
    
    /****************************CRUD USER********************************/
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
            $user->setUpdate_date(date('Y-m-d H:i:s'));

            $this->result = $user ->Actualizar('id');
        }
    }
    public function DeleteUser()
    {
        if(isset($_POST['id'])){
            $user = new \user();
            $user->setId($_POST['id']);

            $this->result = $user ->Borrar('id');
        }
    }
    public function ReadUsers()
    {   
        $user = new \user();
        $this->result = $user ->Buscar();
    }
    /****************************CRUD USER********************************/

    

    /**************************CRUD USER_COMMENT**************************/
    public function CreateUserComment()
    {
        if(isset($_POST['user'], $_POST['comment_text'], $_POST['likes'])){
            $user_comment = new \user_comment();
            $user_comment->setUser($_POST['user']);
            $user_comment->setComent_text($_POST['comment_text']);
            $user_comment->setLikes($_POST['likes']);

            $this->result = $user_comment ->Guardar();
        }
    }
    public function UpdateUserComment()
    {
        if(isset($_POST['id'], $_POST['user'], $_POST['comment_text'], $_POST['likes'])){
            $user_comment = new \user_comment();
            $user_comment->setUser($_POST['id']);
            $user_comment->setUser($_POST['user']);
            $user_comment->setComent_text($_POST['comment_text']);
            $user_comment->setLikes($_POST['likes']);

            $this->result = $user_comment ->Actualizar('id');
        }
    }   
    public function DeleteUserComment()
    {
        if(isset($_POST['id'])){
            $user_comment = new \user_comment();
            $user_comment->setId($_POST['id']);

            $this->result = $user_comment ->Borrar('id');
        }
    }
    public function ReadUserComment()
    {   
        $user_comment = new \user_comment();
        $this->result = $user_comment ->Buscar();
    }
    /**************************CRUD USER_COMMENT**************************/
}