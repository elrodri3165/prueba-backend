<?php
use core\clases\Model;

class user_comment extends Model{

    protected int $id;
    protected int $user;
    protected string $coment_text;
    protected int $likes;
    protected DateTime $creation_date;
    protected DateTime $update_date;

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
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of coment_text
     */ 
    public function getComent_text()
    {
        return $this->coment_text;
    }

    /**
     * Set the value of coment_text
     *
     * @return  self
     */ 
    public function setComent_text($coment_text)
    {
        $this->coment_text = $coment_text;

        return $this;
    }

    /**
     * Get the value of likes
     */ 
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set the value of likes
     *
     * @return  self
     */ 
    public function setLikes($likes)
    {
        $this->likes = $likes;

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
     * Get the value of update_date
     */ 
    public function getUpdate_date()
    {
        return $this->update_date;
    }

    /**
     * Set the value of update_date
     *
     * @return  self
     */ 
    public function setUpdate_date($update_date)
    {
        $this->update_date = $update_date;

        return $this;
    }
}