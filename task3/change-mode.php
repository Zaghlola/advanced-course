<?php

if($_POST){
  setcookie('mode',$_POST['mode'],time()+86400*30,'/');
  header('location: home.php');
}
