<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
    echo "Method Not Allowed 405";
    http_response_code(405);die;
}
$historyFile='data'. DIRECTORY_SEPARATOR . 'history.json';
if(!file_exists($historyFile)){
    file_put_contents($historyFile,json_encode($_POST['members']));
}else{
    $history=json_decode(file_get_contents($historyFile));
    $newData=array_merge($history,$_POST['members']);
    file_put_contents($historyFile,json_encode($newData));
  
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <h1 class="text-center text-dark">
                    Members Data
                </h1>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Fruits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_POST['members'] as $member):?>
                        <tr>
                            <td ><?=$member['name']?></td>
                            <td><?=$member['gender'] ?? "" ?></td>
                            <td><?=implode(',',$member['fruits']?? []) ?></td>
                        </tr>
                     <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>