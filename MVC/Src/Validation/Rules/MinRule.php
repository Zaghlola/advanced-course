<?php 
namespace Src\Validation\Rules;

use Src\Validation\Rules\Contract\Rule;
class MinRule implements Rule{

    public function __construct(private $min) {
        
    }
    public function apply($field,$value,$data):bool{
        return strlen($value) >= $this->min;
        
    }
    public function message():string{
        return ":attr must be at least {$this->min} characters";
        
    }
    public function __toString():string{

        return 'min';
        
    }
}