<?php
/**
 * @ color
 */

class ColorField extends AbstractField
{

    public $field;

    public function create()
    {
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<input type='color' name='{$this->getName()}' value='{$this->getValue()}' />";
        $this->field = $field;
        return $this->field;
    }
}