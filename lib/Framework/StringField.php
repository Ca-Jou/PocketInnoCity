<?php
namespace Framework;

class StringField extends Field
{
    protected $maxLength;

    public function buildWidget()
    {
        $widget = '';

        if (!empty($this->errorMessage))
        {
            $widget .= $this->errorMessage.'<br />';
        }

        $widget .= '<label>'.$this->label.'</label><input type="text" name="'.$this->name.'"';

        if (!empty($this->value))
        {
            $widget .= ' value="'.$this->value.'"';
        }

        if (!empty($this->maxLength))
        {
            $widget .= ' maxlength="'.$this->maxLength.'"';
        }

        $widget .= ' />';

        return $widget;
    }

    // setters
    public function setMaxLength($maxLength)
    {
        $maxLength = (int) $maxLength;

        if ($maxLength > 0)
        {
            $this->maxLength = $maxLength;
        }
        else
        {
            throw new \RuntimeException('Max. length should be a strictly positive integer.');
        }
    }
}