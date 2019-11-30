<?php

require "AbstractField.php";
require "FieldInterface.php";

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


/**
 * Auto register class
 * 
 */
spl_autoload_register(function ($className)
{
    $path = './fields/';
    include $path.$className.'.php';
});



$alpine = Alpine::addForm('form')->addFields(
    TextAreaField::setName('id')->setName("Text_Area")->setLabel("Text Area")->create(),
    TextField::setName('id')->setName("Text_Field")->setLabel("Text Field")->create(),
    ColorField::setName('id')->setName("Color_Field")->setLabel("Color Label")->create(),
    DateField::setName('id')->setName("Date_Field")->setLabel("Date Label")->create(),
    NumberField::setName('id')->setName("NumberField")->setLabel("NumberField Label")->create(), 
)->create();

echo $alpine;
