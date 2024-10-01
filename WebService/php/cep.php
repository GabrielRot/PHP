<?php
  session_start();

  // Obtem o campo CEP do formulário
  $cep = $_REQUEST['cep'];

  // Variável recebe estrutura para inicialização
  // de uma requisição via web
  // utilizando o protocolo http

  // Client URL => curl
  $requestAPI = curl_init();

  // Fazer um setup (preparação)
  // de parâmetros
  curl_setopt_array($requestAPI, [
    CURLOPT_RETURNTRANSFER => 1, // 0 - FALSE // 1 - TRUE
    CURLOPT_URL            => "https://viacep.com.br/ws/$cep/json/"
  ]);

  // Execução da chamada (requisição via web)
  // e o fechamento da requisição
  $response = curl_exec($requestAPI);
  curl_close($requestAPI);

  if($response == false) {
    echo "<h2>Não foi possível receber dados. Tente novamente.</h2>";
    exit();
  }

  // transforma JSON em Array
  $dadosRetorno = json_decode($response, true);

  // Verifica se existe dados para retorno com chave erro
  if(isset($dadosRetorno['erro'])) {
    $_SESSION['erro']     = true;
    $_SESSION['temDados'] = false;
  } else {
    $_SESSION['erro']     = false;
    $_SESSION['temDados'] = true;
    
    $_SESSION['cidade']   = $dadosRetorno['localidade'];
    $_SESSION['estado']   = $dadosRetorno['uf'];
    $_SESSION['rua']      = $dadosRetorno['logradouro'];
  }

  header("Location: ../index.php");
?>