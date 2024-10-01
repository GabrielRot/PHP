<?php
  include("config.php");
  $nomeArq = $nomeArq;

  $id      = $_REQUEST['id'];
  $nome    = $_REQUEST['nome'];
  $email   = $_REQUEST['email'];
  $celular = $_REQUEST['celular'];
  $login   = $_REQUEST['login'];
  $senha   = $_REQUEST['senha'];

  $dadosJson     = file_get_contents($nomeArq);
  $dadosUsuarios = json_decode($dadosJson, true);

  for($i = 0; $i < count($dadosUsuarios); $i++) {
    if($dadosUsuarios[$i]['id'] == $id) {
      $dadosUsuarios[$i]['nome']    = $nome;
      $dadosUsuarios[$i]['email']   = $email;
      $dadosUsuarios[$i]['celular'] = $celular;
      $dadosUsuarios[$i]['login']   = $login;
      $dadosUsuarios[$i]['senha']   = $senha;
      break;
    }
  }

  $dadosJson = json_encode($dadosUsuarios);
  file_put_contents($nomeArq, $dadosJson);

  header("Location: usuarios.php");
?>