<?php

class Pera {
    public $fields;
    public $id;
    static function addForm($id): Pera {
        
        $pera = new Pera();
        $pera->id = $id;
        return $pera;
    }
    function addColumn($columnSize) {
        return $this;
    }
    function addFields(FieldInterface ...$fields) {
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
    public $name = "";
    public $label = "";
    public $default = "";
    public $value = "";

    public static function create($id) {
        
        $abs = new AbstractField();
        $abs->id = $id;
        return $abs;
    }
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    public function setLabel($value) {
        $this->label = $value;
    }
    public function setDefault($value) {
        $this->default = $value;
        return $this;
    }
    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

}


interface FieldInterface {
    static function create($id);
    function setName($name): FieldInterface;
    function setLabel($value): FieldInterface;
    function setDefault($value): FieldInterface;
    function setValue($value): FieldInterface;
}



class TextField extend AbstractField{

    public $field;

    public function make() {

        // return "text";
        $field = "";
        $field .= "<label for='{$this->name}'>{$this->label}</label>";
        $field .= "<textarea name='{$this->name}'></textarea>";
        $this->field = $field;
        return $this;
    }
}
$pera = new TextField;
var_dump($pera->make()->field);
$pera = Pera::addForm('form')->addFields(
   TextField::create('id')->setName("test")->setLabel("label")->make()
)->create();

// echo $pera;
// var_dump($pera);
