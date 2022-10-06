<?php 
$errors=[];
$success=[];
//folder logic
if((isset( $_POST['CreatDir']))){    
    $folderName= $_POST['folderName'];
    if(empty($folderName)){
        $errors['folderName_required']='<div class="alert alert-danger" role="alert"> Folder Name Is Required </div>';
    }
    elseif(file_exists($_POST['folderName'])){
        $errors['folderName_exists']='<div class="alert alert-danger" role="alert"> Folder Name Is Exists </div>';
    }
    else{
        mkdir($folderName);
       $success['folder_success']=' <div class="alert alert-success mt-3 ml-3" role="alert"> Folder is added successfully</div>';
    }
}
//file logic
if((isset( $_POST['CreateFile']))){
    $fileName= $_POST['fileName'];
    $fileNameArray=explode(".",$fileName);
    $extention=$fileNameArray[1];
    $content=$_POST['content'];

        if(empty($content)){
        $errors['content_required']='<div class="alert alert-danger" role="alert"> Content Is Required </div>';
        }

    if(empty($fileName)){
        $errors['fileName_required']='<div class="alert alert-danger" role="alert"> file Name Is Required </div>';
    }
    if(file_exists($fileName)){
        $errors['file_exists']='<div class="alert alert-danger" role="alert"> File Is Exists </div>';
    } 
    if(!($extention=='text'||$extention=='json'||$extention=='php')){
        $errors['error_extention']='<div class="alert alert-danger" role="alert"> File Should be Json OR Php OR Text </div>';
   }
    
     if(!(empty($content))&& !(empty($fileName)) && !(file_exists($fileName)) 
        && !(!($extention=='text'||$extention=='json'||$extention=='php'))){       
        if($extention=='php'){
        file_put_contents($fileName,'<?php  ' . $content .'?>');
        $success['file_success']=' <div class="alert alert-success mt-3 ml-3" role="alert"> File is added successfully</div>';
       }else{
        file_put_contents($fileName,$content);
        $success['file_success']=' <div class="alert alert-success mt-3 ml-3" role="alert"> File is added successfully</div>';

       }
    } 


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
<body>
<div class="">
    <div class="row mt-2 align-center mb-5">
        <div class="col-12 text-center h1 mt-5 red">
             Add Directories OR Files 
            
        </div> 
    </div>
    <div class="row ml-5 ">
        <div class="col-12 text-left h2 color-blue">
        <i class="fa-solid fa-arrow-right font-size-20"></i> Directory
        </div>
        <div class="col-12 text-center">
            <form method="post" action="">
                <!-----create folder------->
                <div class="row d-flex justify-content-center align-items-center">
            <div class="form-group col-3 row">
                <label for="folderName" class="col-5">Folder Name:</label>
                <input type="text" name="folderName" id="folderName" class="form-control col-7">                
            </div>
            
            <div class="form-group text-center col-3  ">
                <button class="btn btn-outline-dark rounded mb-2" name="CreatDir">Creat Directory</button>
            </div> 
           
            </div> 
            <div class="col-6 offset-3">
            <?php
                if(isset($errors['folderName_required'])){
                    echo $errors['folderName_required'];
                }elseif(isset( $errors['folderName_exists'])){
                    echo  $errors['folderName_exists'];
                }elseif(isset($success['folder_success'])){
                    echo $success['folder_success'];
                }
                ?>  
                </div>
               <!-----end create folder------->
            <hr>  

            <div class="col-12 text-left h2 color-blue mt-5">
             <i class="fa-solid fa-arrow-right font-size-20"></i> File
             </div>
             <div class="row mt-5 pl-4 d-flex justify-content-center align-items-center">
             <div class="form-group col-3 row  ">
                <label for="fileName" class="col-4">File Name :</label>
                <input type="text" name="fileName" id="fileName" class="form-control col-8">
            </div> 
            <div class="form-group col-6">
                <textarea name="content" id="content" cols="35" rows="6" placeholder="Please Enter Content"></textarea>
            </div> 
            
            </div>
            <div class="form-group text-center col-10  ">
                <button class="btn btn-outline-dark rounded mb-2" name="CreateFile">Creat File</button>
            </div> 
              
            <div class="col-6 offset-3">
            <?php
                if(isset($errors['fileName_required'])){
                    echo $errors['fileName_required'];
                }elseif(isset( $errors['file_exists'])){
                    echo  $errors['file_exists'];
                }elseif(isset($errors['error_extention'])){
                    echo $errors['error_extention'];
                }

                if(isset( $errors['content_required'])){
                    echo  $errors['content_required'];
                }
                if(isset($success['file_success'])){
                    echo $success['file_success'];
                }
                ?>  
                </div>






            </form>
        </div>
    </div>


</body>
</html>