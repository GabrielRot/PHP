<?php
  include("config.php");

  // Função empty() abaixo retorno valor booleano(true or false)
  // Está conseiderando se não receber um id é para cadstrar um usuário novo(Create/Insert)
  // Se receber um ID é para ser uma alteração(update)
  $cadastro = (isset($_REQUEST["id"]));
  
  $nome    = "";
  $email   = "";
  $celular = "";
  $login   = "";
  $senha   = "";
  $id      = "";
  $op      = 1; //1 = Cadastro, 2 = Alteração
  $acao    = "create.php";
  
  if($cadastro) {
    $dados   = lerDados($_REQUEST['id'], $nomeArq);
    $nome    = $dados['nome'];
    $email   = $dados['email'];
    $celular = $dados['celular'];
    $login   = $dados['login'];
    $senha   = $dados['senha'];
    $id      = $dados['id'];
    $op      = 2; 
    $acao    = "update.php";
  }

  $pagina = preencherPagina( $nome
                           , $email
                           , $celular
                           , $login
                           , $senha
                           , $id
                           , $op
                           , $form
                           , $acao);

  echo $pagina;

  function preencherPagina( $nome
                          , $email
                          , $celular
                          , $login
                          , $senha
                          , $id
                          , $op
                          , $form
                          , $acao) {
    $pagina = file_get_contents("../" . $form);
    $pagina = str_replace("#nome"   , $nome   , $pagina);
    $pagina = str_replace("#email"  , $email  , $pagina);
    $pagina = str_replace("#celular", $celular, $pagina);
    $pagina = str_replace("#login"  , $login  , $pagina);
    $pagina = str_replace("#senha"  , $senha  , $pagina);
    $pagina = str_replace("#id"     , $id     , $pagina);
    $pagina = str_replace("#op"     , $op     , $pagina);
    $pagina = str_replace("#acao"   , $acao   , $pagina);

    return $pagina;
  }

  function lerDados ($id, $nomeArq) {
    $nomeArq   = $nomeArq; 
    $dadosJson = file_get_contents($nomeArq);
    $dados     = []; 

    // transforma json em array
    $dadosUsuarios = json_decode($dadosJson, true);

    foreach ($dadosUsuarios as $usuario) {
      if($usuario["id"] == $id) {
        $dados = $usuario;
        break;
      }
    }

    return $dados;
  }
?>