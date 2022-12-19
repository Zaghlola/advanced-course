<?php

use Src\App;
use Src\Resources\View;
use Src\Support\Inflect;
if(! function_exists("url_slash_handle")){
    function url_slash_handle(&$url){
        if(!str_starts_with($url,'/')){
             $url='/'.$url;
        }
    }
}
if(! function_exists('ds')){
     function ds(){
    return DIRECTORY_SEPARATOR;
    }
}
if(! function_exists('path_slash_handle')){
    function path_slash_handle(?string $path){
        if(!str_starts_with($path,ds())){
             $path=str_replace('/',ds(),ds().$path);
        }
        return $path;
    }
}
if(! function_exists('base_path')){
     function base_path($path =null){
    return __DIR__ . ds(). '..' . ds().'..'.path_slash_handle($path);
    }
}
if(! function_exists('public_path')){
    function public_path($path =null){
   return __DIR__ . ds(). '..' . ds().'..'.ds().'Public'.path_slash_handle($path);
   }
}
if(! function_exists('resource_path')){
    function resource_path($path =null){
   return __DIR__ . ds(). '..' . ds().'..'.ds().'Resources'.path_slash_handle($path);
   }
}
if(! function_exists('resource_component_path')){
    function resource_component_path($path =null){
   return __DIR__ . ds(). '..' . ds().'..'.ds().'Resources'.ds().'Components'.path_slash_handle($path);
   }
}
if(! function_exists('resource_error_path')){
    function resource_error_path($path =null){
   return __DIR__ . ds(). '..' . ds().'..'.ds().'Resources'.ds().'Errors'.path_slash_handle($path);
   }
}
if(! function_exists('resource_view_path')){
    function resource_view_path($path =null){
   return __DIR__ . ds(). '..' . ds().'..'.ds().'Resources'.ds().'Views'.path_slash_handle($path);
   }
}
if(! function_exists('resource_layout_path')){
    function resource_layout_path($path =null){
   return __DIR__ . ds(). '..' . ds().'..'.ds().'Resources'.ds().'Layouts'.path_slash_handle($path);
   }
}
if(! function_exists('view')){
    function view($view,$data=[]){
   View::make($view,$data);
   }
}
if(! function_exists('abort')){
    function abort(int |string $statusCode){
   View::makeError( $statusCode);
   }
}
if(! function_exists('env')){
    function env($key,$default=null){
    return $_ENV[$key]?? $default;
   }
}

if(! function_exists('app')){
    function app(){
    return App::checkedInstance();
   }
}

if(! function_exists('class_basename')){
    function class_basename(string $namespace){
    $namespace=str_replace('\\','/',$namespace);
    $basename= strtolower(basename($namespace));
    return Inflect::pluralize($basename);
   }
}
