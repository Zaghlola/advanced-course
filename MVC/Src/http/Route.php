<?php
namespace Src\http;

class Route{
    private static array $routes =[];
   public function __construct (public Request $request,public Response $response){

    }
   public static  function get(string $url,array|string|callable $action){
    url_slash_handle($url);
    self::$routes['get'][$url]=$action;

    }

   public static  function post(string $url,array|string|callable $action){
    url_slash_handle($url);
    self::$routes['post'][$url]=$action;

    }
    public function resolve(){
    $method= $this->request->method();
    $url=$this->request->url();
    $data= $this->request->all();
    $action=self::$routes[$method][$url]?? null;
    $this->errorHandler($url,$method);
    $this->actionHandle($action,$data);

    }
    public function errorHandler(string $requestUrl,string $requestMethod){
        $findRoute=false;
        $is405=false;
        foreach(self::$routes as $routeMethod =>$routes){
            if(array_key_exists($requestUrl,$routes)){
                $findRoute=true;
                if($routeMethod!=$requestMethod){
                    $is405=true;
                }
            }

        }
        if(! $findRoute){
            echo '404';
        }
        if($is405){
            echo '405';
        }

    }
    public function actionHandle(callable |array|string|null $action , array $data) {
        if(is_callable($action)){
            call_user_func_array($action,[$data]);

        }elseif(is_array($action)){
            call_user_func_array([new $action[0],$action[1]],[$data]);

        }elseif(is_string($action)){
            $action=explode($action,'@');
            call_user_func_array([new $action[0],$action[1]],[$data]);
        }else{

        }

    }
}