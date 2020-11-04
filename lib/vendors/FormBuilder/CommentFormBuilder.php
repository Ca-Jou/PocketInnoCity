<?php
namespace FormBuilder;

use OCFram\FormBuilder;
use OCFram\MaxLengthValidator;
use OCFram\NotNullValidator;
use OCFram\StringField;
use OCFram\TextField;

class CommentFormBuilder extends FormBuilder
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

        // content
        $this->form->add(new TextField([
            'label' => 'Content',
            'name' => 'content',
            'cols' => 7,
            'rows' => 50,
            'validators' => [
                new NotNullValidator('Please fill the Content field'),
            ]
        ]));
    }
}