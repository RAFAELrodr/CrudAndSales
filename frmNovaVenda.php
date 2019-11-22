<?php
session_start();


  if (!isset($_SESSION['user']))
    Header("Location: index.html");

include 'conexaoBanco.php';
$pdo = Connection::connect();
$sql = 'SELECT * FROM produtos;';

?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lista de Produtos</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
  <link href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body style="background-image: url('frutas.jpg'); ; background-size: 60%;">
  <nav class="navbar navbar-expand-lg navbar-light bg-success">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="home.php">Home </a>
        <a class="nav-item nav-link" href="frmListProd.php">Produtos</a>
        <a class="nav-item nav-link" href="frmListCliente.php">Clientes</a>
        <a class="nav-item nav-link disabled" href="#">Disabled</a>
      </div>
    </div>
  </nav>
  <!-- <input  style="margin-left:50px; margin-top: 40px;"
    type="button" class="btn btn-info btn-lg" 
    id="btNovo" value="Nova Venda" onclick="javascript: location.href='frmNovaVenda.php'"> -->





  <div class=" container col-md-5">
    <h1 style="margin-bottom: 20px; padding:10px;" class="bg-white text-center text-success">Historico de Vendas</h1>
  </div>
  <div class=" col-3">
    <h5 style="margin-bottom: 0px; padding:10px;" class="bg-white text-left text-success"><strong>Venda # </strong><?php echo $_SESSION['id_venda']; ?> </h5>
    <h5 style="margin-bottom: 50px; padding:10px;" class="bg-white text-left text-success"><strong>Cliente: </strong><?php echo $_SESSION['nome_cliente']; ?> </h5>
  </div>
  <div class="form-group input-group col-4 container">
    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
    <input name="consulta" id="txt_consulta" placeholder="Consultar Produto" type="text" class="form-control">
  </div>
  <div class="container col-4">


    <table id="tabNovaVenda" class="table table-hover table-striped bg-light " style="text-align: left;">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Descricao</th>
          <th scope="col">Quantidade</th>
          <th scope="col"> Valor</th>
          <th scope="col"></th>
        </tr>
      </thead>


      <tbody id="tbody">
        <?php foreach ($pdo->query($sql) as $row) {

          ?>
          <tr>

            <td><?php echo $row['id']; ?></d>
            <td><?php echo $row['descricao']; ?></td>
            <td><?php echo $row['quantidade']; ?></td>
            <td><?php echo $row['valor']; ?></td>
            <td>
              <?php
                echo '<a  role="button" class="btn btn-success" href="frmcarrinho.php?add=carrinho&id=' . $row['id'] . '">Adicionar</a>';
                ?>

          </tr>

        <?php } ?>
      </tbody>

    </table>

  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>



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
  <script>
    /* function editar(e) {

      var linha = $(e).closest("tr");
      var id = linha.find("td:eq(0)").text().trim(); // texto da primeira coluna
      var descricao = linha.find("td:eq(1)").text().trim(); // texto da segunda coluna
      var quantidade = linha.find("td:eq(2)").text().trim(); // texto da terceira coluna
      var valor = linha.find("td:eq(3)").text().trim(); // texto da quarta coluna

      $("#idProd").val(id);
      $("#descProd").val(descricao);
      $("#inputNet").val(quantidade);
      $("#valorProd").val(valor);
      $("#inputGross").val(valor);

    } */
  </script>

</body>

</html>