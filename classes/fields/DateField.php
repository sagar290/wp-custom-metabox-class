<?php
/**
 * @ Date
 */

class DateField extends AbstractField
{

    public $field;

    public function create()
    {
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<input type='date' name='{$this->getName()}' value='{$this->getValue()}' />";
        $this->field = $field;
        return $this->field;
    }
}