<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: index.php");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: home.php");
 }
 
 if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  setcookie("a","",time()-50000,'/');
    setcookie("b","",time()-50000,'/');
  header("Location: index.php");
  exit;
 }
 ?>