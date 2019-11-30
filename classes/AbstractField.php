<?php


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
            // checking property static or not
            $prop = new ReflectionProperty($this, $property);
            if ($prop->isStatic()) {
                return self::$name; 
            } else {
                return $this->$property;
            }
        }
    }
}