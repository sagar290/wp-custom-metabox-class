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

/**
 *  @Text Input
 */
class TextField extends AbstractField
{

    public $field;

    public function create()
    {
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<input type='text' name='{$this->getName()}' value='{$this->getValue()}' />";
        $this->field = $field;
        return $this->field;
    }
}

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

/**
 * @ Email
 */

class EmailField extends AbstractField
{

    public $field;

    public function create()
    {
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<input type='email' name='{$this->getName()}' value='{$this->getValue()}' />";
        $this->field = $field;
        return $this->field;
    }
}
/**
 * @ File
 */

class FileField extends AbstractField
{

    public $field;

    public function create()
    {
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<input type='file' name='{$this->getName()}' value='{$this->getValue()}' />";
        $this->field = $field;
        return $this->field;
    }
}

/**
 * @ hidden
 */

class HiddenField extends AbstractField
{

    public $field;

    public function create()
    {
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<input type='hidden' name='{$this->getName()}' value='{$this->getValue()}' />";
        $this->field = $field;
        return $this->field;
    }
}

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

/**
 * @ password
 */

class PasswordField extends AbstractField
{

    public $field;

    public function create()
    {
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<input type='password' name='{$this->getName()}' value='{$this->getValue()}' />";
        $this->field = $field;
        return $this->field;
    }
}

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

/**
 * @ Search
 */

class SearchField extends AbstractField
{

    public $field;

    public function create()
    {
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<input type='search' name='{$this->getName()}' value='{$this->getValue()}' />";
        $this->field = $field;
        return $this->field;
    }
}
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
/**
 * @ Time
 */

class TimeField extends AbstractField
{

    public $field;

    public function create()
    {   
     
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<input type='time' name='{$this->getName()}' value='{$this->getValue()} />";
        $this->field = $field;
        return $this->field;
    }
}
/**
 * @ URL
 */

class URLField extends AbstractField
{

    public $field;

    public function create()
    {   
     
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<input type='url' name='{$this->getName()}' value='{$this->getValue()} />";
        $this->field = $field;
        return $this->field;
    }
}

/**
 * @ Select
 */

class SelectField extends AbstractField
{

    public $field;

    public function create()
    {   

        $default = $this->getDefault();
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<select name='{$this->getName()}'>";

        foreach ($this->getOptions() as $key => $value) {
            $selected = ($key == $default)? "selected": "";
            $field .= "<option {$selected} value=\"{$key}\">{$value}</option>";
        }
        $field .= "</select>";
        $this->field = $field;
        return $this->field;
    }
}

/**
 * @ Multy Select
 */

class MultySelectField extends AbstractField
{

    public $field;

    public function create()
    {   

        $default = $this->getDefault();
        $field = "";
        $field .= "<label for='{$this->getName()}'>{$this->getLabel()}</label>";
        $field .= "<select name='{$this->getName()}' multiple>";

        foreach ($this->getOptions() as $key => $value) {
            $selected = ($key == $default)? "selected": "";
            $field .= "<option {$selected} value=\"{$key}\">{$value}</option>";
        }
        $field .= "</select>";
        $this->field = $field;
        return $this->field;
    }
}
