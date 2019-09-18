<?php

class Pera {
    public $fields;
    public static $id;
    static function addForm($id): Pera {
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
            $form .= $field->field;
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
    public $field;


    public static function setName($name) {
        static::$name = $name;
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

    public function create() {
        return $this->field;
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
        $field .= "<label for='". parent::$name ."'>".$this->label."</label>";
        $field .= "<textarea name='".parent::$name."'></textarea>";
        $this->field = $field;
        return $this->field;
    }
}


$pera = Pera::addForm('form')->addFields(
   TextField::setName('id')->setName("test")->setLabel("label")->create()
)->create();


echo $pera;
// var_dump($pera);
