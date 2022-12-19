<?php

abstract class anyEmployee {
    public $id;
    public $name;
    public $basicSalary;
    public $type;
    public $hours=176;
    public const bouns=1000;//manger
    public abstract function CalculateSalaryPerHour(&$hours );
}    