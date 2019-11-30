<?php
/**
 * @ Range
 */

class RangeField extends AbstractField
{

    public $field;

    public function create()
    {
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<input type='range' name='{$this->getName()}'   min='{$this->getMin()}' max='{$this->getMax()}' step='{$this->getStep()}' value='{$this->getValue()}' />";
        $this->field = $field;
        return $this->field;
    }
}