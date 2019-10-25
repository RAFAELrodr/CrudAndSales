<?php
/* session_start();
if (!isset($_SESSION['user']))
  Header("Location: index.html"); */

include 'conexaoBanco.php';
$id = trim($_GET['id']);
$pdo = Connection::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'SELECT * FROM produtos WHERE id=?';
$q = $pdo->prepare($sql);
$q->execute(array($id));
$data = $q->fetch(PDO::FETCH_ASSOC);
$desc = $data['descricao'];
$qtd = $data['quantidade'];
$valor = $data['valor'];
Connection::disconnect();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function() {
      $(".btn").click(function() {
        $("#delModal").modal("show");
      });
    });
  </script>
  <style>
  .font-lg{
    font-size: 150%;
  }
</style>

  <title>Editar Produto</title>
</head>

<body style="background-image: url('frutas.jpg'); background-size: 60%;">
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
  <div class="card border-success container" style="background-color: #f2f2f2; margin-top: 40px; margin-bottom: 30px; max-width: 30rem">
   
  <h1 class="text-center text-success" style="margin-top:20px">Remover Produto</h1>

    <form id="frmRemoveProd" name="frmRemove
    Prod" method="POST" action="removeProd.php">
      <div class="font-lg card-body ">
        <label for="lblId">
          <span class="font-weight-bold text-success">ID:</span>
          <span class="font-weight-bold" style="margin-left:30px"><?php echo $id ?></span>
        </label>
        <input type="hidden" name="id" value="<?php echo $id ?>" />
      </div>

      <div  class="font-lg card-body text-center">
        <label for="lblDesc">
          <span class="font-weight-bold">Descricao:</span>
          <span class="font-weight-normal " style="margin-left:50px"><?php echo $desc ?></span>
        </label>
      </div>
      <div class="font-lg card-body text-center">
        <label for="lblQtde">
          <span class="font-weight-bold">Quantidade:</span>
          <span class="font-weight-normal" style="margin-left:30px"><?php echo $qtd ?></span>
        </label>
      </div>
      <div class="font-lg card-body text-center">
        <label for="lblValor">
          <span class="font-weight-bold">Valor:</span>
          <span class="font-weight-normal" style="margin-left: 100px"><?php echo $valor ?></span>
        </label>
      </div>
      <div class="card-body text-center">
      <input type="button" value="Voltar" class="btn btn-warning" id="btVoltar" name="btVoltar" onclick="javascript: location.href='frmListProd.php'">
      <!-- <input type="submit" class="btn btn-danger " id="btRem" name="btRem" value="Excluir"> -->
      <a href="#delModal" class="btn btn-danger" data-toggle="modal">Excluir</a>
      <!-- Modal HTML -->
      <div id="delModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Confirmação</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <p>Deseja remover este produto?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
          </div>
        </div>
      </div>

      </div>
      
    </form>
  </div>

</body>

</html>