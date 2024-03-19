<?php
use core\clases\Model;

class user extends Model{

    protected int $id;
    protected string $fullname;
    protected string $email;
    protected string $pass;
    protected string $openid;
    protected \DateTime $creation_date;
    protected \DateTime $update_date;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of fullname
     */ 
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set the value of fullname
     *
     * @return  self
     */ 
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of pass
     */ 
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get the value of openid
     */ 
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * Set the value of openid
     *
     * @return  self
     */ 
    public function setOpenid($openid)
    {
        $this->openid = $openid;

        return $this;
    }

    /**
     * Get the value of creation_date
     */ 
    public function getCreation_date()
    {
        return $this->creation_date;
    }

    /**
     * Set the value of creation_date
     *
     * @return  self
     */ 
    public function setCreation_date($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Get the value of update_date_datetime
     */ 
    public function getUpdate_date()
    {
        return $this->update_date;
    }

    /**
     * Set the value of update_date_datetime
     *
     * @return  self
     */ 
    public function setUpdate_date($update_date_datetime)
    {
        $this->update_date = new DateTime($update_date_datetime);

        return $this;
    }
}