<?php

class users_sessions extends Model{
    
    protected int $id_users_sessions;
    
    protected int $id_user;
    protected string $last_ip;
    protected string $last_login;
    protected int $expires_in;
    protected string $http_user_agent;
    
    
    public function SetIdUsersSessions($id_users_sessions){
        $this->id_users_sessions = $id_users_sessions;
    }
    public function SetIdUser($id_user){
        $this->id_user = $id_user;
    }
    public function SetLastIp($last_ip){
        $this->last_ip = $last_ip;
    }
    public function SetLastLogin($last_login){
        $this->last_login = $last_login;
    }
    public function SetExpiresIn($expires_in){
        $this->expires_in = $expires_in;
    }
    public function SetHttpUserAgent($http_user_agent){
        $this->http_user_agent = $http_user_agent;
    }
    
    public function GetLastIp(){
        return $this->last_ip;
    }
    public function GetHttpUserAgent(){
        return $this->http_user_agent;
    }
}