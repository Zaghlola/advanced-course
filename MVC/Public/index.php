<?php

use App\Models\User;
use Src\Database\Grammers\MysqlGrammer;
use Src\Database\Mangers\MysqlManger;
use Src\Validation\Rules\Contract\AlphaNumericalRule;
use Src\Validation\Rules\Contract\RequiredRule;
use Src\Validation\Validator;

require __DIR__ .DIRECTORY_SEPARATOR.'..'. DIRECTORY_SEPARATOR .'vendor'. DIRECTORY_SEPARATOR .'autoload.php';
require base_path('Routes/web.php');

//dd(app(),app(),app(),app());

app()->run();
// $data=[
//     'first_name'=>'%asdghjkl',
//     'password'=>'1123145'
// ];
// $rules=[
//     'first_name'=>'required|alnum|max:5',
//     'password'=>['required','between:5,10']
// ];
// $messages=[
//     'required'=>'required input',
//     'first_name.alnum'=>'enter valid name',
// ];
// $attributes=[
//     'first_name'=>'First Name',
// ];
// $validator=Validator::make($data,$rules,$messages,$attributes);

// if($validator->fails()){
//     dd($validator->errors());
// }
//dd(MysqlGrammer::buildUpdateQuery(['username','password'],[['id','=',4],['status','=','active']]));
//dd(MysqlGrammer::buildDeleteQuery());
// $mysqlManger= new MysqlManger;
// $mysqlManger->connect();
//$mysqlManger->create(['username'=>'zaghlola','password'=>12344565]);
//dd(User::create(['username'=>'fahd','password'=>12344565]));
