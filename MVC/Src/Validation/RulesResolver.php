<?php
namespace Src\Validation;
class RulesResolver{
    public static function make(array|string $rules){
        if(is_string($rules)){
            $rules=self::convertStringRulesToArray($rules);
        }
      return  array_map(function($rule){

            if(is_string($rule)){
               return self::getRuleFromString($rule);
            }
            return $rule;

        },$rules);
      
    }
    private static function getRuleFromString($rule)
    {
        $args=[];
        if(str_contains($rule,':')){
            $exploded =explode(':',$rule);
            $rule=$exploded[0];
            
            $args=explode(',',$exploded[1]);
        }
        return RulesMapper::resolve($rule,$args);
    }
  
     private static function convertStringRulesToArray(string $rules):array
    {
        return explode('|',$rules);
    }

}