<?php
namespace Framework;

class NotNullValidator extends Validator
{
    public function isValid($value)
    {
        return ($value != '');
    }
}