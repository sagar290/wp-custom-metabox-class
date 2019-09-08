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
}




class AbstractField  implements FieldInterface {
    public $id = "";
    public $label = "";
    public $default = "";
    public $value = "";

    public static function create($id) {
        
        $abs = new AbstractField();
        $abs->id = $id;
        return $abs;
    }
    public function setId($id): FieldInterface {
        $this->id = $id;
        return $this;
    }
    public function setLabel($value): FieldInterface {
        $this->label = $value;
        return $this;
    }
    public function setDefault($value): FieldInterface {
        $this->default = $value;
        return $this;
    }
    public function setValue($value): FieldInterface {
        $this->value = $value;
        return $this;
    }
}


interface FieldInterface {
    static function create($id);
    function setId($id): FieldInterface;
    function setLabel($value): FieldInterface;
    function setDefault($value): FieldInterface;
    function setValue($value): FieldInterface;
}



class TextField extends AbstractField {

}



// $text = TextField::create('id')->setId("id")->setLabel("label");
// var_dump($text);
$pera = Pera::addForm('form')->addFields(
   TextField::create('id')->setValue("test")->setLabel("label")
);

var_dump($pera);