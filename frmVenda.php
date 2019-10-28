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

  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
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
<div >
    <br>
<form name="frmBusca" class="container form-inline my-2 my-lg-0" method="POST" id="form-search" 
action="busca.php" >
    <span>Nome: </span>
      <input class="form-control mr-sm-2" name="pesquisa" id="buscar" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul></ul>
</body>

</html>