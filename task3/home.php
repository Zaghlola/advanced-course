<?php

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <?php if(isset($_COOKIE['mode']) && $_COOKIE['mode']=='dark'){?>

          <link rel="stylesheet" href="assets/dark.css">      
    <?php }else{ ?>
      <link rel="stylesheet" href="assets/light.css">  

 <?php } ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="mode-bg">

  <!-- navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      
      <li class="nav-item">

      <form action="change-mode.php" method="post">
        <?php if (isset ($_COOKIE['mode'])&& $_COOKIE['mode']=='dark'){?>
          <button  name="mode" value="light">
          <i style="cursor:pointer;" class="fa-sharp fa-solid fa-sun"></i>
            </button>
        <?php }else{?> 
          <button  name="mode" value="dark">
            <i style="cursor:pointer;" class="fa-solid fa-moon curser"></i>
              
         </button>
          <?php }?>
            </form>       
      </li>

      <li>
       <a href="history.php"> History</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

  <!-- end navbar -->

  
  <div class="container">
    <div class="row">
        <!-- <div class="col-12 text-left mt-3">
            <div class="col-2 my-2">
              <form action="" method="post">
            <button style="border:0;background:transparent color:<?=$text??$text?>" name="darkMode"> <i class="fa-solid fa-moon"></i></button>
            </form>  
            </div>
            <div class="col-2">
              <form action="" method="post">
            <button style="border:0;background:transparent ;color:gold" name="lightMode"> <i class="fa-sharp fa-solid fa-sun"></i></button>
            </form>  
            </div>
            
        </div> -->
        <div class="col-12 my-2">

            <h1 class="text-center mode-text ">
                Buy Now !
            </h1>
        </div>
        <div class="col-4 offset-4">
            <form action="buy.php" method="post">
                <div class="form-group">
                  <label for="number_of_members" class="mode-text">Number Of Family  Members</label>
                  <input type="number" name="number_of_members" id="number_of_members" class="form-control" placeholder="" aria-describedby="helpId">
                
                </div>
                <button class="btn btn-outline-primary form-control"> Choose Fruits</button>
            </form>
        </div>
    </div>
  </div>       
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>


    </script>
  </body>
</html>