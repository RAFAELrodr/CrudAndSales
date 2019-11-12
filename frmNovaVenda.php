<?php
/* session_start();
if(!isset($_SESSION['user']))
  Header("Location: index.html"); */


?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lista de Produtos</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
  <link href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>



</head>

<body style="background-image: url('frutas.jpg'); background-repeat: no-repeat; background-size: 100%;">

  <nav class="navbar navbar-expand-lg navbar-light bg-success">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link " href="frmListProd.php">Produtos</a>
        <a class="nav-item nav-link" href="frmListCliente.php">Clientes</a>
        <a class="nav-item nav-link disabled" href="#">Vendas</a>
      </div>
    </div>
  </nav>
  <div class="container">
    <h2>Vendas</h2>
  <title data-url="insertVenda.php"></title>
    <div class="form-group input-group col-4">
      <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
      <input name="consulta" id="txt_consulta" placeholder="Consultar produto" type="text" class="form-control">
    </div>

    <div class="container">
      <?php
      include 'conexaoBanco.php';
      $pdo = Connection::connect();
      $sql = 'SELECT * FROM produtos;';

      ?>
<div class="row justify-content-between">
  <div class="col-4">
    <h3>Tabela de Produtos</h3>
      <table id="tabela" class="table table-hover table-striped bg-light "style="text-align: left;">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Produtos</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Valor</th>
          </tr>
        </thead>
        

          <tbody id="tbody">
          <?php foreach ($pdo->query($sql) as $row) {
          $id = $row['id'];
          $desc = $row['descricao'];
          $qtde = $row['quantidade'];
          $valor = $row['valor'];
          ?>
            <tr>

              <th scope="row"><?php echo $id ?></th>
              <td><?php echo $desc ?></td>
              <td><?php echo $qtde ?></td>
              <td><?php echo $valor ?></td>
            </tr>
            <?php } ?>
          </tbody>
       
      </table>
      </div>
      
      
        <div class="col-4">
      <table id="tabela" class="table table-hover table-striped bg-light" style="text-align: left;">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Produtos</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Valor</th>
          </tr>
        </thead>
        

          <tbody id="tbody">
          <?php foreach ($pdo->query($sql) as $row) {
          $id = $row['id'];
          $desc = $row['descricao'];
          $qtde = $row['quantidade'];
          $valor = $row['valor'];
          ?>
            <tr>

              <th scope="row"><?php echo $id ?></th>
              <td><?php echo $desc ?></td>
              <td><?php echo $qtde ?></td>
              <td><?php echo $valor ?></td>
            </tr>
            <?php } ?>
          </tbody>
       
      </table>
      </div>
      </div>
    </div>


  </div>
  <script>
    $(document).ready(function() {
      $("#txt_consulta").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tbody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

</body>

</html>