<?php
/**
 *  @textArea
 *  
 */
class TextAreaField extends AbstractField
{

    public $field;

    public function create()
    {
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<textarea name='{$this->getName()}'>{$this->getValue()}</textarea>";
        $this->field = $field;
        return $this->field;
    }
}