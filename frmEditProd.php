<?php
/* session_start();
if(!isset($_SESSION['user']))
  Header("Location: index.html"); */

 include 'conexaoBanco.php';
 $id = trim($_GET['id']);
 $pdo = Connection::connect();
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = 'SELECT * FROM produtos WHERE id=?';
 $q = $pdo->prepare($sql);
 $q->execute(array($id));
 $data =$q->fetch(PDO::FETCH_ASSOC);
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Editar Produto</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-success">
     <a class="navbar-brand" href="#">Navbar</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
       <div class="navbar-nav">
         <a class="nav-item nav-link" href="home.php">Home </a>
         <a class="nav-item nav-link active" href="#">Produtos</a>
         <a class="nav-item nav-link" href="#">Pricing</a>
         <a class="nav-item nav-link disabled" href="#">Disabled</a>
       </div>
     </div>
   </nav>

<div class=" card border-success container" 
style="background-color: #e6ffee; margin-top: 20px; margin-bottom: 30px; max-width: 30rem">

<h1  class="text-center text-success">Editar Produto</h1>
    
    <form id="frmEditProd" name="frmEditProd" method="POST" action="editProduto.php">
      <div class=" card-body">
        <label class="font-weight-bold text-success " for="lblId">Codigo: </label>
        <label  class="font-weight-bold" for="txtId" style="margin-left:30px"> <?php echo $id ?> </label>
        <input type="hidden"   id="id" name="id" value="<?php echo $id ?>">
      </div>
      <div class="card-body">
        <label for="lblDescricao" class="font-weight-bold text-success">Descrição</label>
        <input id="txtDescricao" class="form-control border-success" type="text" name="txtDescricao" required value="<?php echo $desc ?>">
      </div>
      <div class="card-body">
        <label for="lblQtde" class="font-weight-bold text-success">Quantidade</label>
        <input id="txtQtde" class="form-control border-success" type="text" name="txtQtde" value="<?php echo $qtd ?>">
      </div>
      <div class="card-body">
        <label for="lblValor" class="font-weight-bold text-success">Valor</label>
        <input id="txtValor" class="form-control border-success" type="text" name="txtValor" value="<?php echo $valor ?>">
      </div>
      <div class="card-body text-center">
      <input type="button" value="Voltar" class="btn btn-warning" id="btVoltar" 
      name="btVoltar" onclick="javascript: location.href='frmListProd.php'">
      <input type="submit" class="btn btn-success" id="btGvr" name="btGvr" value="Gravar">
      </div>
      
    </form>
</div>
<style>
  .a{
    font-size: 150%;
  }
</style>
</html>