<?php 
define('SUPPORTED_EXTENSIONS',['php','txt','json']);
//define("PATH",'media' . DIRECTORY_SEPARATOR);
$basePath = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']);

$arrayofdir=explode('\\', __DIR__);
$currentDir=end($arrayofdir) .DIRECTORY_SEPARATOR;
$imagePath =$basePath .'/images/';
$dataPath =$basePath .DIRECTORY_SEPARATOR .$currentDir;
$readDir= __DIR__.DIRECTORY_SEPARATOR;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['create-folder'])){
        // create folder
        $newFolder=$readDir  . $_POST['folder'] . DIRECTORY_SEPARATOR ;
        mkdir($newFolder);
        copy(__file__ ,$newFolder.'index.php');
        $folderMessage =  "<div class='alert alert-success text-center'> {$_POST['folder']} Created Successfully </div>";
    }

    if(isset($_POST['create-file'])){
        // create file
        $fileExtension = pathinfo($_POST['file'])['extension'];
        $fileName = pathinfo($_POST['file'])['basename'];
        if(! in_array($fileExtension,SUPPORTED_EXTENSIONS)){
            $error = "<div class='alert alert-danger text-center'> Unsupported File </div>";
        }
        $content = $_POST['content'];
        if($fileExtension == 'php'){
            $content = "<?php {$content} ?>";
        }elseif($fileExtension == 'json'){
            $content = "{ {$content} }";
        }
        file_put_contents($readDir  . $fileName,$content);
        $fileMessage = "<div class='alert alert-success text-center'> {$fileName} Created Successfully </div>";
    }
}



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
           return 'file.png';
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
            
            <div class="col-6">
                <h1 class="text-dark text-center">Create Folder</h1>
                <?= $folderMessage ?? "" ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="folder">Folder Name</label>
                        <input type="text" name="folder" id="folder" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>
                    <button class="btn btn-outline-dark" name="create-folder"> Create </button>
                </form>
            </div>
            <div class="col-6">
            <h1 class="text-dark text-center">Create File</h1>
            <?= $error ?? "" ?>
            <?= $fileMessage ?? "" ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="folder">File Name</label>
                        <input type="text" name="file" id="folder" class="form-control" placeholder="example.txt"
                            aria-describedby="helpId">
                            <small> Supported Files <b><?= implode(' , ',SUPPORTED_EXTENSIONS) ?> </b> </small>
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="" cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-outline-dark" name="create-file"> Create </button>
                </form>
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