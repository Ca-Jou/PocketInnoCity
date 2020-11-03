<?php
namespace Framework;

abstract class Validator
{
    protected $errorMessage;

    public function __construct($errorMessage)
    {
        $this->setErrorMessage($errorMessage);
    }

    abstract public function isValid($value);

    // getters
    public function errorMessage()
    {
        return $this->errorMessage;
    }

    // setters
    public function setErrorMessage($errorMessage)
    {
        if (is_string($errorMessage))
        {
            $this->errorMessage = $errorMessage;
        }
    }
}