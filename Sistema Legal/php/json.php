<?php
  $dados = 
  [
    [
      "login" => "deise",
      "senha" => "teste"
    ],
    [
      "login" => "Joao",
      "senha" => "1234"
    ]
  ];

  echo "<h1><pre>";
  print_r($dados);
  $json = json_encode($dados);
  echo "</pre>";
  print_r($json);

  // grava um arquivo do tipo texto com uma estrutura json
  file_put_contents("usuario.json", $json);
  echo "<br>Criou um arquivo usuarios.json";

  // leitura do arquivo json
  $jsonLido = file_get_contents("usuario.json");

  // Transforma JSON em array
  $dadosLidos = json_decode($jsonLido, true);

  echo "<hr><center><table><tr><td>Login</td><td>Senha</td></tr>";
  foreach($dadosLidos as $usuario) {
    echo "<tr>";
    echo "<td>";
    echo $usuario["login"];
    echo "</td>"; 
    echo "<td>";
    echo $usuario["senha"];
    echo "</td>";
    echo "</tr>";
  }
  echo "</table></center>";
  
  // echo "<pre>";
  // print_r($dadosLidos);

?>