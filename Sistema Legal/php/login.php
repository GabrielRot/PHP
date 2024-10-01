<?php
  include("config.php");

  $newPagina = file_get_contents("../html/login.html");

  $login       = $_REQUEST["login"];
  $loginstatus = $_REQUEST["loginstatus"];
  $senha       = $_REQUEST["senha"];

  if($login == ''){
    $newPagina = str_replace("css/bootstrap.min.css", "../css/bootstrap.min.css", $newPagina);
    $newPagina = str_replace("css/font-awesome.min.css", "../css/font-awesome.min.css", $newPagina);
    $newPagina = str_replace("css/styles.css", "../css/styles.css", $newPagina);
  
    $newPagina = str_replace("#mensagem", "Login não informado.", $newPagina);
    $newPagina = str_replace("php/login.php", 'login.php', $newPagina);
      
    echo $newPagina;
    exit();
  }

  if($senha == ''){
    $newPagina = str_replace("css/bootstrap.min.css", "../css/bootstrap.min.css", $newPagina);
    $newPagina = str_replace("css/font-awesome.min.css", "../css/font-awesome.min.css", $newPagina);
    $newPagina = str_replace("css/styles.css", "../css/styles.css", $newPagina);
  
    $newPagina = str_replace("#mensagem", "Senha não informada.", $newPagina);
    $newPagina = str_replace("php/login.php", 'login.php', $newPagina);
      
    echo $newPagina;
    exit();
  }

  $dadosJson     = file_get_contents($nomeArq);
  $dadosUsuarios = json_decode($dadosJson, true);

  for($i = 0; $i < count($dadosUsuarios); $i++) {
    if($dadosUsuarios[$i]['senha'] == $senha) {
    //    if($dadosUsuarios[$i]['senha'] == $senha) {
        $newPagina = str_replace("#2", "#1", $newPagina);
        header("Location: ../html/menu.html");     
    //  } 
    }
  }

  $newPagina = str_replace("css/bootstrap.min.css", "../css/bootstrap.min.css", $newPagina);
  $newPagina = str_replace("css/font-awesome.min.css", "../css/font-awesome.min.css", $newPagina);
  $newPagina = str_replace("css/styles.css", "../css/styles.css", $newPagina);

  $newPagina = str_replace("#mensagem", "Login ou senha incorreto.", $newPagina);
  $newPagina = str_replace("php/login.php", 'login.php', $newPagina);
    
  echo $newPagina;
  exit();

  // if($login == "admin" && $senha == "root") {
  //   $newPagina = str_replace("#2", "#1", $newPagina);
  //   header("Location: ../html/menu.html");
  // } else {
  //   $newPagina = str_replace("css/bootstrap.min.css", "../css/bootstrap.min.css", $newPagina);
  //   $newPagina = str_replace("css/font-awesome.min.css", "../css/font-awesome.min.css", $newPagina);
  //   $newPagina = str_replace("css/styles.css", "../css/styles.css", $newPagina);

  //   $newPagina = str_replace("#mensagem", "Login ou senha incorreto.", $newPagina);
  //   $newPagina = str_replace("php/login.php", 'login.php', $newPagina);
    
  //   echo $newPagina;
  //   exit();
  // }
?>