<?php
/**
 * @ tel
 */

class TelephoneField extends AbstractField
{

    public $field;

    public function create()
    {   
        $pattern = ($this->pattern)? "pattern={$this->pattern}": "";
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<input type='tel' name='{$this->getName()}' value='{$this->getValue()}' $pattern />";
        $this->field = $field;
        return $this->field;
    }
}