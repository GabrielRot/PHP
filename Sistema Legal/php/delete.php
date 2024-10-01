<?php 
  include("config.php");
  $nomeArq = $nomeArq;

  $id = $_REQUEST['id'];

  $usuarios = [];
  // Abaixo leitura do arquivo com dados dos
  // usuários
  $dadosJson = file_get_contents($nomeArq);

  // Abaixo transforma dados lidos em Json para array
  $dadosUsuarios = json_decode($dadosJson, true);
  
  for($i = 0; $i < count($dadosUsuarios); $i++) {
    if($dadosUsuarios[$i]['id'] == $id) continue;

    $usuarios[$i]['id']      = $dadosUsuarios[$i]['id'];
    $usuarios[$i]['nome']    = $dadosUsuarios[$i]['nome'];
    $usuarios[$i]['email']   = $dadosUsuarios[$i]['email'];
    $usuarios[$i]['celular'] = $dadosUsuarios[$i]['celular'];
    $usuarios[$i]['login']   = $dadosUsuarios[$i]['login'];
    $usuarios[$i]['senha']   = $dadosUsuarios[$i]['senha'];
  }

  $usuariosJson = json_encode($usuarios);
  file_put_contents($nomeArq, $usuariosJson);

  header('Location: usuarios.php');
?>