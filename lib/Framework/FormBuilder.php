<?php
namespace Framework;

abstract class FormBuilder
{
    protected $form;

    public function __construct(Entity $entity)
    {
        $this->setForm(new Form($entity));
    }

    abstract public function build();

    // getters
    public function form()
    {
        return $this->form;
    }

    // setters
    public function setForm(Form $form)
    {
        $this->form = $form;
    }
}