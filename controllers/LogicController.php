<?php
use core\clases\WebMaker;
use models\user;
use models\user_comment;

class LogicController{

    private $result;
    
    public function __construct()
    {   
        //opciones que se pueden desabilitar
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
        //valida el token entre pantallas, si se desea recibir peticiones de afuera, se deberá eliminar o comentar
        WebMaker::ValidateToken();
        if(isset($_POST['fullname'], $_POST['email'], $_POST['pass'], $_POST['openid'])){
            $user = new \user();

            $user->setFullname(strval($_POST['fullname']));
            $user->setEmail(strval($_POST['email']));
            $user->setPass(strval($_POST['pass']));
            $user->setOpenid(intval($_POST['openid']));

            $this->result = $user ->Guardar();
        }
    }
    public function UpdateUser()
    {
        //valida el token entre pantallas, si se desea recibir peticiones de afuera, se deberá eliminar o comentar
        WebMaker::ValidateToken();
        if(isset($_POST['id'], $_POST['fullname'], $_POST['email'], $_POST['pass'], $_POST['openid'])){
            $user = new \user();

            $user->setId(intval($_POST['id']));
            $user->setFullname(strval($_POST['fullname']));
            $user->setEmail(strval($_POST['email']));
            $user->setPass(strval($_POST['pass']));
            $user->setOpenid(intval($_POST['openid']));
            $user->setUpdate_date(date('Y-m-d H:i:s'));

            $this->result = $user ->Actualizar('id');
        }
    }
    public function DeleteUser()
    {   
        //valida el token entre pantallas, si se desea recibir peticiones de afuera, se deberá eliminar o comentar
        WebMaker::ValidateToken();
        if(isset($_POST['id'])){
            $user = new \user();
            $user->setId(intval($_POST['id']));

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
        //valida el token entre pantallas, si se desea recibir peticiones de afuera, se deberá eliminar o comentar
        WebMaker::ValidateToken();
        if(isset($_POST['user'], $_POST['comment_text'], $_POST['likes'])){
            $user_comment = new \user_comment();
            $user_comment->setUser(intval($_POST['user']));
            $user_comment->setComent_text(strval($_POST['comment_text']));
            $user_comment->setLikes(intval($_POST['likes']));

            $this->result = $user_comment ->Guardar();
        }
    }
    public function UpdateUserComment()
    {   
        //valida el token entre pantallas, si se desea recibir peticiones de afuera, se deberá eliminar o comentar
        WebMaker::ValidateToken();
        if(isset($_POST['id'], $_POST['user'], $_POST['comment_text'], $_POST['likes'])){
            $user_comment = new \user_comment();
            $user_comment->setId(intval($_POST['id']));
            $user_comment->setUser(intval($_POST['user']));
            $user_comment->setComent_text(strval($_POST['comment_text']));
            $user_comment->setLikes(intval($_POST['likes']));

            $this->result = $user_comment ->Actualizar('id');
        }
    }   
    public function DeleteUserComment()
    {   
        //valida el token entre pantallas, si se desea recibir peticiones de afuera, se deberá eliminar o comentar
        WebMaker::ValidateToken();
        if(isset($_POST['id'])){
            $user_comment = new \user_comment();
            $user_comment->setId(intval($_POST['id']));

            $this->result = $user_comment ->Borrar('id');
        }
    }
    public function ReadUserComments()
    {   
        $user_comment = new \user_comment();
        $this->result = $user_comment ->Buscar();
    }
    /**************************CRUD USER_COMMENT**************************/
}