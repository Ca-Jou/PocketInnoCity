<?php
namespace Framework;

abstract class Entity implements \ArrayAccess
{
    use Hydrator;

    protected $errors = [];
    protected $id;

    public function __construct(array $data=[])
    {
        if (!empty($data))
        {
            $this->hydrate($data);
        }
    }

    public function isNew()
    {
        return empty($this->id);
    }

    // getters
    public function errors()
    {
        return $this->errors;
    }

    public function id()
    {
        return $this->id;
    }

    // setters
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    public function offsetSet($var, $value)
    {
        $method = 'set'.ucfirst($var);
        if (isset($this->$var) && is_callable([$this, $method]))
        {
            $this->$method($value);
        }
    }

    public function offsetExists($var)
    {
        return (isset($this->$var) && is_callable([$this, $var]));
    }

    public function offsetUnset($var)
    {
        throw new \Exception('Suppressing a value is not permitted.');
    }

    public function offsetGet($var)
    {
        if (isset($this->$var) && is_callable([$this, $var]))
        {
            return $this->$var();
        }
    }
}