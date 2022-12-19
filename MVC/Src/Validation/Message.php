<?php
namespace Src\Validation;

class Message{

    public static array $messages;
    public static array $attributes;

    public function __construct(array $messages ,array $attributes) {
        self::$messages=$messages;
        self::$attributes=$attributes;
    }
    public static function generate($field,$rule){
        if(array_key_exists((string)$rule,self::$messages)){

            return self::$messages[(string)$rule];

        }
        if(array_key_exists($field.'.'.$rule,self::$messages)){

            return self::$messages[$field.'.'.$rule];

        }
        return str_replace(':attr',self::getAttrVal($field),$rule->message());

    }
    public static function getAttrVal($field)
    {
       return self::$attributes[$field]??$field;
    }
}