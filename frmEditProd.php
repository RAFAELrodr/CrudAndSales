<?php
session_start();
if(!isset($_SESSION['user']))
  Header("Location: index.html");

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
<div class="container">
    <h1>Editar Produto</h1>
    <form id="frmEditProd" name="frmEditProd" method="POST" action="editProduto.php">
      <div class="form-group">
        <label for="lblId">ID: <?php echo $id ?></label>
        <input type="hidden"   id="id" name="id" value="<?php echo $id ?>">
      </div>
      <div class="form-group">
        <label for="lblDescricao">Descrição</label>
        <input id="txtDescricao" class="form-control" type="text" name="txtDescricao" value="<?php echo $desc ?>">
      </div>
      <div class="form-group">
        <label for="lblQtde">Quantidade</label>
        <input id="txtQtde" class="form-control" type="text" name="txtQtde" value="<?php echo $qtd ?>">
      </div>
      <div class="form-group">
        <label for="lblValor">Valor</label>
        <input id="txtValor" class="form-control" type="text" name="txtValor" value="<?php echo $valor ?>">
      </div>
      <input type="submit" class="btn btn-success" id="btGvr" name="btGvr" value="Gravar">
      <input type="button" value="Voltar" class="btn btn-warning" id="btVoltar" 
      name="btVoltar" onclick="javascript: location.href='frmListProd.php'">
    </form>
</div>
</html>