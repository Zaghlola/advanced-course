<?php

use App\Models\User;
use Src\Database\Grammers\MysqlGrammer;
use Src\Database\Mangers\MysqlManger;
use Src\Validation\Rules\Contract\AlphaNumericalRule;
use Src\Validation\Rules\Contract\RequiredRule;
use Src\Validation\Validator;

require __DIR__ .DIRECTORY_SEPARATOR.'..'. DIRECTORY_SEPARATOR .'vendor'. DIRECTORY_SEPARATOR .'autoload.php';
require base_path('Routes/web.php');


app()->run();
