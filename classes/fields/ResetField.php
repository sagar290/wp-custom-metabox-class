<?php
/**
 * @ Reset
 */

class ResetField extends AbstractField
{

    public $field;

    public function create()
    {
        $field = "";
        $field .= "<input type='reset' value='{$this->getValue()}' />";
        $this->field = $field;
        return $this->field;
    }
}