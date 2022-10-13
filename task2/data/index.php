<?php 

$basePath = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']);
$imagePath =$basePath .'/images/';
$dataPath =$basePath .'/data/';
$readDir= __DIR__;

$readDirFiles=scandir($readDir);
prepareDir($readDirFiles);


function prepareDir(array & $readDirFiles){
    //delete '.' '..'
    array_splice($readDirFiles,0,2);
    //delete idex.php
    array_splice($readDirFiles,array_search('index.php',$readDirFiles),1);
    }

function getImage($file){
    $extension=pathinfo($file,PATHINFO_EXTENSION);
    if($extension===""){
        return 'folder.png';
    }
    switch ($extension) {
        case 'pdf':            
           return 'pdf.png';
        case 'txt':            
           return 'pdf.png';
        case 'doc':
        case 'pdf':
            return 'word.png';
            
        default:
        return 'default.png';
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container">
        <div class="row mt-5">

            <div class="col-12 text-center text-dark h1 my-5">
                <?=basename( $readDir); ?>
            </div>
            <?php foreach($readDirFiles as $file):?>
            <div class="col-2">
                <a href="<?= $dataPath.$file?>">
                <div class="card text-left">
                  <img class="card-img-top w-100" src="<?=$imagePath. getImage($file)?>" alt="">
                  <div class="card-body">
                   <p class="card-title text-primary"> <?= $file ?></p>
                  </div>
                </div>
                </a>
            </div>
            <?php endforeach?>

        </div>
    </div>
</body>
</html>