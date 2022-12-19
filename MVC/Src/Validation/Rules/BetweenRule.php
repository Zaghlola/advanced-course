<?php
namespace Src\Validation\Rules;

use Src\Validation\Rules\Contract\Rule;

class BetweenRule implements Rule{
    public function __construct(private $min, private $max) {
        
    }
    public function apply($field,$value,$data):bool{
        $valueLength=strlen($value);
       return $valueLength <= $this->max && $valueLength>= $this->min ;
        
    }
    public function message():string{
        return ":attr must be Between {$this->min},{$this->max}";
        
    }
    public function __toString():string{

        return 'between';
        
    }
}