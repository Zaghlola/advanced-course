<?php
namespace Src\Validation\Rules\Contract;
interface Rule{
    public function apply($field,$value,$data):bool;
    public function message():string;
    public function __toString():string;

   
}