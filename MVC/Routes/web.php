<?php

use Src\http\Route;
use App\Controllers\HomeController;
use App\Controllers\LoginController;


Route::get('/',function(){
    echo 'hello';

});
Route::get('/home',[HomeController::class,'index']);
Route::post('/login',[LoginController::class,'login']);
Route::post('register','App\Controllers\LoginController@register');