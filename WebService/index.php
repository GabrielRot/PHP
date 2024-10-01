<?php
  session_start();

  $form = file_get_contents("html/cep.html");
  $dadosCEP = "";

  // verifica se existe variável de sessão erro e se
  // seu conteúdo é igual a true
  if(isset($_SESSION['erro']) && $_SESSION['erro'] == true) {
    $dadosCEP = "Digite um CEP válido.";
  }

  if(isset($_SESSION['temDados']) && $_SESSION['temDados'] == true) {
    $dadosCEP = "<br>Cidade: "   . $_SESSION['cidade'] .
                "<br>Estado: "   . $_SESSION['estado'] .
                "<br>Endereço: " . $_SESSION['rua'];
  }

  $form = str_replace("#resultado", $dadosCEP, $form);
  //$form = str_replace("php/crud.php", "crud.php", $form);

  echo $form;
?>