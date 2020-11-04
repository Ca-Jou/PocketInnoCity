<?php
namespace FormBuilder;

use OCFram\FormBuilder;
use OCFram\MaxLengthValidator;
use OCFram\NotNullValidator;
use OCFram\StringField;
use OCFram\TextField;

class NewsFormBuilder extends FormBuilder
{
    public function build()
    {
        // author
        $this->form->add(new StringField([
            'label' => 'Author',
            'name' => 'author',
            'validators' => [
                new MaxLengthValidator('Author is too long (max 20 chars)', 20),
                new NotNullValidator('Please fill the Author field'),
            ],
        ]));

        // title
        $this->form->add(new StringField([
            'label' => 'Title',
            'name' => 'title',
            'validators' => [
                new MaxLengthValidator('Title is too long (max 100 chars)', 100),
                new NotNullValidator('Please fill the Title field'),
            ]
        ]));

        // content
        $this->form->add(new TextField([
            'label' => 'Content',
            'name' => 'content',
            'cols' => 8,
            'rows' => 60,
            'validators' => [
                new NotNullValidator('Please fill the Content field'),
            ]
        ]));
    }
}