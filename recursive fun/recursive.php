<?php 


 function deleteDir($dir_path){
   if (!(str_ends_with( $dir_path,'\\') ||str_ends_with( $dir_path,'/'))){
       
    $dir_path.=DIRECTORY_SEPARATOR; 
   }
    $scan_dir=scandir($dir_path);
    foreach ($scan_dir as $file){
        if($file=="." || $file ==".."){
            continue;
        }
        if(is_dir($dir_path.$file)){
           
            deleteDir($dir_path.$file);
        }
        elseif(is_file($dir_path.$file)){
        unlink($dir_path.$file);}
    }
    rmdir($dir_path);
}


deleteDir('x');