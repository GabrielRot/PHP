<?php
  include("config.php");
  $nomeArq = $nomeArq;

  $dados = [];
  
  if(file_exists($nomeArq)) {
    $dadosJson = file_get_contents($nomeArq);

    $dados = json_decode($dadosJson, true);
  }

  $id = gerarId($dados);

  $dadosForm = [];
  $dadosForm["id"]      = $id;
  $dadosForm["nome"]    = $_REQUEST["nome"];
  $dadosForm["email"]   = $_REQUEST["email"];
  $dadosForm["celular"] = $_REQUEST["celular"];
  $dadosForm["login"]   = $_REQUEST["login"]; 
  $dadosForm["senha"]   = $_REQUEST["senha"];

  // Inclui em dados o conteúdo de dadosForm
  array_push($dados, $dadosForm);

  // Transformar array para json
  $dadosJson = json_encode($dados);

  // grava o arquivo com o novo registro de usuário
  file_put_contents($nomeArq, $dadosJson);

  // redirecionar para o programa index.html
  header("Location: usuarios.php");

  // objetivo da função abaixo é encontrar o último id
  // utilizado e somar um
  function gerarId($dados) {
    $ids = array_column($dados, 'id');
    // $id  = max($ids);
    
    // $id++;
    $id = 0;
    if(count($ids) > 0) {
      $id = max($ids)+1;
    } else{
      $id++;
    }

    //$id = max((isset(($ids)) ? $ids : 0))+1;
 
    return $id;
  }
?>