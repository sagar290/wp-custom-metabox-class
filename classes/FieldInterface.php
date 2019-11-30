<?php
interface FieldInterface
{
    static function setName($name): FieldInterface;
    function setLabel($value): FieldInterface;
    function setDefault($value): FieldInterface;
    function setValue($value): FieldInterface;
    function setType($value): FieldInterface;
    function setMax($value): FieldInterface;
    function setMin($value): FieldInterface;
    function setStep($value): FieldInterface;
    function setPattern($value): FieldInterface;
    function require($value): FieldInterface;
    function create();
}