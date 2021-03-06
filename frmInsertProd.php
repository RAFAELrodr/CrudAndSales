<?php 
if(!isset($_SESSION['user']))
Header("Location: index.html");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Novo Produto</title>
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
<div class="card border-success container" style="background-color: #f2f2f2; margin-top: 30px; margin-bottom: 30px; max-width: 30rem">
    <h1  class="text-center text-success" style="margin-top: 20px;">Novo Produto</h1>
    <form id="frmEditProd" name="frmEditProd" method="POST" action="insertProduto.php">
      <div class="card-body">
        <label for="lblDescricao" class="font-weight-bold text-success">Descrição</label>
        <input id="txtDescricao" class="form-control border-success" type="text" name="txtDescricao" required>
      </div>
      <div class="card-body">
        <label for="lblQtde" class="font-weight-bold text-success">Quantidade</label>
        <input id="txtQtde" class="form-control border-success" type="text" name="txtQtde" >
      </div>
      <div class="card-body">
        <label for="lblValor" class="font-weight-bold text-success">Valor</label>
        <input id="txtValor" class="form-control border-success" type="text" name="txtValor">
      </div>
      <div class="card-body text-center">
        <input style="margin-right: 30px;" type="submit" class="btn btn-success" id="btGvr" name="btGvr" value="Gravar">
        <input type="button" value="Voltar" class="btn btn-warning" id="btVoltar" 
        name="btVoltar" onclick="javascript: location.href='frmListProd.php'">
      </div>
      
    </form>
</div>
</html>