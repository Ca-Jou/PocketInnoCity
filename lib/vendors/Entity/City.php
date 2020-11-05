<?php
namespace Entity;

use Framework\Entity;

class City extends Entity
{
    protected $cityID;
    protected $name;
    protected $zip;
    protected $country;
    protected $admin;

    const INVALID_NAME = 1;
    const INVALID_ZIP = 2;
    const INVALID_COUNTRY = 3;

    public function isValid()
    {
        return !(empty($this->name) || empty($this->zip) || empty($this->country));
    }

    // setters
    public function setCityID($id)
    {
        $this->cityID = (int) $id;
    }

    public function setName($name)
    {
        if (empty($name) || !is_string($name)) {
            $this->errors[] = self::INVALID_NAME;
        }
        $this->name = ucfirst($name);
    }

    public function setZip($zip)
    {
        if (!is_string($zip) || empty($title) || strlen($zip) != 5) {
            $this->errors[] = self::INVALID_ZIP;
        }
        $this->zip = $zip;
    }

    public function setCountry($country)
    {
        if (!is_string($country) || empty($country)) {
            $this->errors[] = self::INVALID_COUNTRY;
        }
        $this->country = ucfirst($country);
    }

    public function setAdmin($userID)
    {
        $this->admin = (int)$userID;
    }

    // getters
    public function cityID()
    {
        return $this->cityID;
    }

    public function name()
    {
        return $this->name;
    }

    public function zip()
    {
        return $this->zip;
    }

    public function country()
    {
        return $this->country;
    }

    public function admin()
    {
        return $this->admin;
    }
}