<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Usuários</title>
  </head>
  <body>
    <div class="center-content"><h1 class="center-content">Usuários</h1></div><hr>
    <?php
      // inclui todo conteudo do arquivo do arquivo config.php
      include("config.php");

      echo '<form class="col-2" action="crud.php" method="post">
        <button class="btn btn-success">Novo Usuário</button>
      </form>';

      // abaixo verifica se existe o arquivo de dados
      // se existir retorna true, caso contrário, false
      $existe = file_exists($nomeArq);

      if($existe == false) {
        echo "<p><h3>Não existe nenhum usuário...</h3></p>";
      } else {
        // leitura do arquivo json
        $jsonLido = file_get_contents($nomeArq);

        // Transforma JSON em array
        $dadosLidos = json_decode($jsonLido, true);
    ?>

    <table class="table text-center">
      <thead>
        <tr>
          <th scope="col" class="font-weight-bold">Imagem</th>
          <th scope="col" class="font-weight-bold">Nome</th>
          <th scope="col" class="font-weight-bold">Email</th>
          <th scope="col" class="font-weight-bold">Celular</th>
          <th scope="col" class="font-weight-bold">Login</th>
          <th scope="col" class="font-weight-bold">Senha</th>
          <th scope="col" class="font-weight-bold">Ações</th>
        </tr>
      </thead>
      <tbody>

    <?php
        foreach($dadosLidos as $usuario) {
          $update = "crud.php?id=" . $usuario["id"];
          $delete = "delete.php?id=" . $usuario["id"];
          echo "<tr>";
          echo "<td>";
          echo '<img class="img-index-table" src="https://loremflickr.com/200/200?random=' .$usuario["id"] . '"/>';
          echo "</td>";
          echo "<td>";
          echo $usuario["nome"];
          echo "</td>";
          echo "<td>";
          echo $usuario["email"];
          echo "</td>";
          echo "<td>";
          echo $usuario["celular"];
          echo "</td>";
          echo "<td>";
          echo $usuario["login"];
          echo "</td>"; 
          echo "<td>";
          echo $usuario["senha"];
          echo "</td>";
          echo "<td>";
          echo "<a class='btn btn-outline-primary' href='" . $update . "'>Alterar</a>  ";
          echo "<a class='btn btn-outline-danger' href='" . $delete . "'>Excluir</a>";
          echo "</td>";
          echo "</tr>";
        }
        echo "</tbody>
        </table>";
      }


    ?>
    </body>
</html>