<?php
namespace Src\Resources;
class View{
    public static function make ($view ,$data=[]){
        //get base view (ex:app.php) content
        $baseView=self::getBaseView();
        //get variables in base view =>$title,$content
        //get child (index.php) content
        $contentView= self::getContentView($view ,$data);
        //get value of variables from cild view =>titleValue ,contentValue
        echo self::mixer($baseView, $contentView);
 
    }
    public static function makeError(int |string $statusCode)
    { $path=resource_error_path("{$statusCode}.php");
      if (file_exists($path)){
       include $path;
      }else{
        throw new \Exception("{$statusCode} Error view not found in ".resource_error_path());
      }
        
    }
    public static function getBaseView()
    {
        ob_start();
        include resource_layout_path('app.php');
        return ob_get_clean();

    }
    public static function getContentView($view,$data =[])
    {
        ob_start();
        foreach($data as $key =>$value){
            $$key=$value;
        }
        self::viewPathRebuilder($view);
        include resource_view_path($view);
        return ob_get_clean();

    }
    public static function viewPathRebuilder(&$view) // viewPath=>'dashboard.index' or 'dashboard/index'
    {
        if(str_contains($view,'.')){//if viewPath=>'dashboard.index'
          $view=str_replace('.',ds(),$view); //convert viewPath from =>'dashboard.index' To =>'dashboard/index'
        }

        $view .='.php';
    }
    public static function mixer($baseView, $contentView){
        $baseViewVars=self::baseViewVars($baseView);
        $contentViewVars=self::contentViewVars($contentView);
        for($i=0;$i<count($baseViewVars);$i++){
            $baseView=str_replace($baseViewVars[$i],$contentViewVars[$baseViewVars[$i]] ?? "",$baseView);
        }
        return $baseView;

    }
    public static function baseViewVars($baseView){//base view variables
        return self::getVars($baseView,'{{','}}')[0];

    }
    public static function contentViewVars($contentView){//content view variables
       $contentViewVars= self::getVars($contentView,'{{','}}')[1];
       $contentViewVarsValues=[];
       foreach($contentViewVars as $key=>&$value ){
        $key=strtok($value,'=');
        $value=substr($value,strpos($value,'=')+1);
       
        $contentViewVarsValues["{{{$key}}}"]=$value;

       }
       return $contentViewVarsValues;

    }
    
    

    public static function getVars($str,$startWord,$endWord){
    preg_match_all("/$startWord((.|\r\n)*?)$endWord/",$str,$matches);
    return $matches;
    }
}