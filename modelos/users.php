<?php

class users extends core\clases\Model{
    
    protected int $id_user;
    
    protected string $apellido;
    protected string $nombre;
    protected int $dni;
    protected string $email;
    protected string $fecha_nacimiento;
    protected string $password;
    
    protected string $last_ip;
    protected bool $activo;
    
    
    public function SetIduser($id_user){
        $this->id_user = $id_user;
    }
    public function SetApellido($apellido){
        $this->apellido = $apellido;
    }
    public function SetNombre($nombre){
        $this->nombre = $nombre;
    }
    public function SetDni($dni){
        $this->dni = $dni;
    }
    public function SetEmail($email){
        $this->email = $email;
    }
    public function SetFecha_Nacimiento($fecha_nacimiento){
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
    public function SetPassword($password){
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    public function SetLastIp($last_ip){
        $this->last_ip = $last_ip;
    }
    public function SetActivo($activo){
        $this->activo = $activo;
    }
    
    
    public function GetDni(){
        return $this->dni;
    }
    public function GetApellido(){
        return $this->apellido;
    }
    public function GetNombre(){
        return $this->nombre;
    }
    

    public function GetUserCompleto(){
        return $this->apellido.' '.$this->nombre.'(DNI: '.$this->dni.')';
    }
    
    
}