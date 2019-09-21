<?php

class Alpine {
    public $fields;
    public static $id;
    static function addForm($id): Alpine {
        static::$id = $id;
        return new static();
    }
    function addColumn($columnSize) {
        return $this;
    }
    function addFields(...$fields) {
        // var_dump($fields); 
        $this->fields = $fields;
        return $this;
    }

    public function create() {
        $form = "";
        $form .= "<form>";
        foreach($this->fields as $field) {
            $form .= $field;
        }
        $form .= "</form>";

        return $form;
    }
}

class AbstractField {
    public $id = "";
    public static $name = "";
    public $label = "";
    public $default = "";
    public $value = "";
    public $type = "text";
    public $field;



    public static function setName($name) {
        self::$name = $name;
        return new static();
    }
    public function setLabel($value) {
        $this->label = $value;
        return $this;
    }
    public function setDefault($value) {
        $this->default = $value;
        return $this;
    }
    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    public function create() {
        return $this->field;
    }



    public function getName() {
        return self::$name;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getType() {
        return $this->type;
    }


}


interface FieldInterface {
    static function setName($name): FieldInterface;
    function setLabel($value): FieldInterface;
    function setDefault($value): FieldInterface;
    function setValue($value): FieldInterface;
    function create();
}



class TextField extends AbstractField {

    public $field;

    public function create() {
        $field = "";
        $field .= "<label for='". $this->getName() ."'>".$this->getLabel()."</label>";
        $field .= "<textarea name='".$this->getName()."'></textarea>";
        $this->field = $field;
        return $this->field;
    }
}

class Input extends AbstractField {

    public $field;

    public function create() {
        $field = "";
        $field .= "<label for='". $this->getName() ."'>".$this->getLabel()."</label>";
        $field .= "<input type='". $this->getType() ."' name='".$this->getName()."'></input>";
        $this->field = $field;
        return $this->field;
    }
}



$alpine = Alpine::addForm('form')->addFields(
   TextField::setName('id')->setName("test")->setLabel("label")->create(),
   TextField::setName('id')->setName("test")->setLabel("label")->create(),
   Input::setName('id')->setName("test")->setLabel("label")->create()
)->create();


echo $alpine;
