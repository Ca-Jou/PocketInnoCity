<?php
namespace Entity;

use Framework\Entity;

class User extends Entity
{
    protected $userID;
    protected $pseudo;
    protected $mail;
    protected $city;
    protected $password;

    const INVALID_PSEUDO = 1;
    const INVALID_CITY = 2;
    const INVALID_PASSWORD = 3;
    const INVALID_MAIL = 4;
    const INVALID_ID = 5;

    public function isValid()
    {
        return !(empty($this->pseudo) || empty($this->city) || empty($this->password) || empty($this->mail));
    }

    // setters
    public function setUserID($id)
    {
        if (!is_int($id))
        {
            $this->errors[] = self::INVALID_ID;
        }
        $this->userID = $id;
    }

    public function setPseudo($pseudo)
    {
        if (empty($pseudo))
        {
            $this->errors[] = self::INVALID_PSEUDO;
        }
        $this->pseudo = $pseudo;
    }

    public function setPassword($password)
    {
        if (!is_string($password) || empty($password) || strlen($password) < 8 || strlen($password) > 20)
        {
            $this->errors[] = self::INVALID_PASSWORD;
        }
        $this->password = $password;
    }

    public function setCity($city)
    {
        if (!is_int($city))
        {
            $this->errors[] = self::INVALID_CITY;
        }
        $this->city = $city;
    }

    public function setMail($mail)
    {
        if (!is_string($mail) || empty($mail) || strlen($mail) < strpos($mail, '@'))
        {
            $this->errors[] = self::INVALID_MAIL;
        }
        $this->mail = $mail;
    }

    // getters
    public function userID()
    {
        return $this->userID;
    }

    public function pseudo()
    {
        return $this->pseudo;
    }

    public function city()
    {
        return $this->city;
    }

    public function mail()
    {
        return $this->mail;
    }

    public function password()
    {
        return $this->password;
    }
}