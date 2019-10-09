<?php

class Alpine
{
    public $fields;
    public static $id;
    static function addForm($id): Alpine
    {
        static::$id = $id;
        return new static();
    }
    function addColumn($columnSize)
    {
        return $this;
    }
    function addFields(...$fields)
    {
        // var_dump($fields); 
        $this->fields = $fields;
        return $this;
    }

    public function create()
    {
        $form = "";
        $form .= "<form>";
        foreach ($this->fields as $field) {
            $form .= $field;
        }
        $form .= "</form>";

        return $form;
    }
}

class AbstractField
{
    public $id = "";
    public static $name = "";
    public $label = "";
    public $default = "";
    public $value = "";
    public $type = "text";
    public $max = 100;
    public $min = 1;
    public $step = 1;
    public $pattern = "";
    public $options = [];
    public $required;
    public $disable;
    public $field;

    public static function setName($name)
    {
        self::$name = $name;
        return new static();
    }
    public function setLabel($value)
    {
        $this->label = $value;
        return $this;
    }
    public function setDefault($value)
    {
        $this->default = $value;
        return $this;
    }
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setMax($max) {
        $this->max = $max;
        return $this;
    }
    public function setMin($min) {
        $this->min = $min;
        return $this;
    }
    public function setStep($step) {
        $this->step = $step;
        return $this;
    }

    public function setPattern($pattern) 
    {
        $this->pattern = $pattern;
        return $this;
    }
    public function require($bool = true) 
    {
        $this->required = $bool;
        return $this;
    }

    public function setOptions($arr) 
    {   
        if (!is_array($arr)) {
           throw new Exception("{$arr} is not an array!", 1);
        }
        $this->options = $arr;
        return $this;
    }

    public function disable($bool = true) 
    {
        $this->disable = $bool;
        return $this;
    }

    public function create()
    {
        return $this->field;
    }


    public function __call($name, $arguments)
    {
        if (property_exists($this, strtolower(substr($name, 3)))) {
            // escaping first 3 char from name
            $property = strtolower(substr($name, 3));
            // checking property statiuc or not
            $prop = new ReflectionProperty($this, $property);
            if ($prop->isStatic()) {
                return self::$name; 
            } else {
                return $this->$property;
            }
        }
    }
}


interface FieldInterface
{
    static function setName($name): FieldInterface;
    function setLabel($value): FieldInterface;
    function setDefault($value): FieldInterface;
    function setValue($value): FieldInterface;
    function setMax($value): FieldInterface;
    function setMin($value): FieldInterface;
    function setStep($value): FieldInterface;
    function create();
}


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

$alpine = Alpine::addForm('form')->addFields(
    TextAreaField::setName('id')->setName("Text_Area")->setLabel("Text Area")->create(),
    TextField::setName('id')->setName("Text_Field")->setLabel("Text Field")->create(),
    ColorField::setName('id')->setName("Color_Field")->setLabel("Color Label")->create(),
    DateField::setName('id')->setName("Date_Field")->setLabel("Date Label")->create(),
    NumberField::setName('id')->setName("NumberField")->setLabel("NumberField Label")->create(),
    MultySelectField::setName('id')->setName("NumberField")->setLabel("NumberField Label")->setOptions([
        "test", "test2", "test3" 
    ])->setDefault(2)->create()
)->create();


echo $alpine;
