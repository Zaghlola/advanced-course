<?php
namespace Src\Validation\Rules;

use Src\Validation\Rules\Contract\Rule;
class RequiredRule implements Rule{
    public function apply($field,$value,$data):bool{
        return !empty($value);
        
    }
    public function message():string{
        return ":attr is required";
        
    }
    public function __toString():string{

        return 'required';
        
    }

}