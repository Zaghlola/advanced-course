<?php

class employee {
    public $id;
    public $name;
    public $basicSalary;
    public $type;
    public function CalculateSalaryPerHour($type,$hours = 176)
    {
        if($type == 'manger'){
            return( $this->basicSalary / $hours) * 1.5; //

        }else{
            return $this->basicSalary / $hours;

        }
    }
}

// 5000
// 5000 / (8*22) = 25