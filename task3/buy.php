<?php

if($_SERVER['REQUEST_METHOD']=='GET'){
    echo "Method Not Allowed 405";
    http_response_code(405);die;
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

    <form method="post" action="result.php">

        <div class="container">
            <div class="row mt-5">
                <div class="col-12 text-primary text-center my-5">
                    <h1>Choose Your Fav Fruits</h1>
                </div>
                <?php for($i=0; $i<$_POST['number_of_members'];$i++):?>
                <div class="col-4">
                    <div class="member">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="members[<?=$i?>][name] " id="members[<?=$i?>][name] " class="form-control" placeholder="" aria-describedby="helpId">

                        </div>

                        <div class="form-group">

                            <div class="form-check">
                                <label class="form-check-label mr-5">
                                    <input type="radio" class="form-check-input" name="members[<?=$i?>][gender] " id="members[<?=$i?>][gender] " value="female">
                                    Female
                                </label>

                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="members[<?=$i?>][gender] " id="members[<?=$i?>][gender]" value="male">
                                    Male
                                </label>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="members[<?=$i?>][fruits][]" id="" value="apple">
                                    Apple
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="members[<?=$i?>][fruits][]" id="" value="banana">
                                    Banana
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="members[<?=$i?>][fruits][]" id="" value="strawberry">
                                    Strawberry
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endfor?>
                <div class="col-12">
                <button class="btn btn-primary form-control">Choose</button>
                </div>
 

                
            </div>
        </div>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>