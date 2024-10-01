<?php session_start(); 
    $loginPage = file_get_contents("html/login.html");
    $loginPage = str_replace("#mensagem", " ", $loginPage);

    //if(isset($_REQUEST["op"])) {
      echo $loginPage;
    //}
?>


<?php
  include("php/config.php");

  $menu        = file_get_contents("html/menu.html");
?>