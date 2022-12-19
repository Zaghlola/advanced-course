<?php
include_once "anyEmployee.php";
class manger extends anyEmployee{
    public  function CalculateSalaryPerHour(&$hours){
        return(( $this->basicSalary + anyEmployee::bouns)/ $hours) * 1.5; //
    }

}