<?php
include_once "anyEmployee.php";
class employee extends anyEmployee{
    public  function CalculateSalaryPerHour(&$hours){
        return $this->basicSalary / $hours;
    }

}