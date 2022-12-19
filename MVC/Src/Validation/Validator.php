<?php
namespace Src\Validation;

use Src\Validation\Rules\Contract\Rule;

class Validator{
    protected static array $data=[];
    protected static array $rules=[];
    protected static Message $message;
    protected static ErrorBag $errorBag;

    public static function make(array $data,array $rules,array $messages=[],array $attributes=[])
    {
        self::$data=$data;
        self::$rules=$rules;
        self::$message=new Message($messages,$attributes);
        self::$errorBag=new ErrorBag;
        self::validate();
        return self::$errorBag;

        
    }
    public static function validate()
    {
        foreach( self::$rules as $field=>$rules){ 

            foreach(RulesResolver::make($rules) as $rule){
                self::applayRule($field,$rule);
            }

        }
    }
    public static function applayRule($field,$rule){
       if (! $rule->apply($field,self::getFaieldValue($field),self::$data))
       {
            self::$errorBag->append($field,Message::generate($field,$rule));
       }
    }
    public static function getFaieldValue(string $field)
    {
        return self::$data[$field] ?? null;
    }
    }