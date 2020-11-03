<?php
namespace Framework;

class Form
{
    protected $entity;
    protected $fields = [];

    public function __construct(Entity $entity)
    {
        $this->setEntity($entity);
    }

    public function add(Field $field)
    {
        // retrieve the field name and add the corresponding value to the field
        $attr = $field->name();
        $field->setValue($this->entity->$attr());

        // add the field to the fields list, and return the updated form
        $this->fields[] = $field;
        return $this;
    }

    public function createView()
    {
        $view = '';

        foreach ($this->fields as $field)
        {
            $view .= $field->buildWidget().'<br />';
        }

        return $view;
    }

    public function isValid()
    {
        $valid = true;

        foreach ($this->fields as $field)
        {
            if (!$field->isValid())
            {
                $valid = false;
            }
        }

        return $valid;
    }

    // getters
    public function entity()
    {
        return $this->entity;
    }

    // setters
    public function setEntity(Entity $entity)
    {
        $this->entity = $entity;
    }
}