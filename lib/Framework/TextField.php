<?php
namespace Framework;

class TextField extends Field
{
    protected $cols;
    protected $rows;

    public function buildWidget()
    {
        $widget = '';

        if (!empty($this->errorMessage))
        {
            $widget .= $this->errorMessage.'<br />';
        }

        $widget .= '<label>'.$this->label.'</label><textarea name="'.$this->name.'"';

        if (!empty($this->rows))
        {
            $widget .= ' rows="'.$this->rows.'"';
        }

        if (!empty($this->cols))
        {
            $widget .= ' cols="'.$this->cols.'"';
        }

        $widget .= '>';

        if (!empty($this->value))
        {
            $widget .= htmlspecialchars($this->value);
        }

        $widget .= '</textarea>';

        return $widget;
    }

    // setters
    public function setCols($cols)
    {
        $cols = (int) $cols;

        if ($cols > 0)
        {
            $this->cols = $cols;
        }
    }

    public function setRows($rows)
    {
        $rows = (int) $rows;

        if ($rows > 0)
        {
            $this->rows = $rows;
        }
    }
}