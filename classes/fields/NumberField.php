<?php
/**
 * @ number
 */

class NumberField extends AbstractField
{

    public $field;

    public function create()
    {
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<input type='number' name='{$this->getName()}'   min='{$this->getMin()}' max='{$this->getMax()}' step='{$this->getStep()}' value='{$this->getValue()}' />";
        $this->field = $field;
        return $this->field;
    }
}