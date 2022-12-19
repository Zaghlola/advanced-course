<?php
include_once "employee.php";
include_once "manger.php";
class main{
    public function CalculateSalary(object $any_employee ){
        return $any_employee->CalculateSalaryPerHour($any_employee->hours);
    }
}





$employee = new employee;
$employee->id = 1;
$employee->name = "galal";
$employee->basicSalary = 2000;
$employee->hours=5;

$employee2 = new employee;
$employee2->id = 3;
$employee2->name = "galal";
$employee2->basicSalary = 2000;



$manger1 = new manger;
$manger1->id = 2;
$manger1->name = "ahmed";
$manger1->basicSalary = 3000;
$manger1->hours=10;

echo '<br>';
echo '<br>';
 

$main =new main;

echo $main->CalculateSalary($employee);
echo '<br>';
echo $main->CalculateSalary($employee2);
echo '<br>';
echo $main->CalculateSalary($manger1);