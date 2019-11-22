<?php
session_start();
if (!isset($_SESSION['user']))
    Header("Location: index.html");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Novo Cliente</title>
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
                <a class="nav-item nav-link " href="frmVendas.php">Vendas</a>
            </div>
        </div>
    </nav>
    <div class="card border-success container" style="background-color: #f2f2f2; margin-top: 30px; margin-bottom: 30px; max-width: 30rem">
        <h1 class="text-center text-success" style="margin-top: 20px;">Novo Cliente</h1>
        <form id="frmEditProd" name="frmEditProd" method="POST" action="insertCliente.php">
            <div class="card-body">
                <label for="lblNome" class="font-weight-bold text-success">Nome</label>
                <input id="txtNome" class="form-control border-success" type="text" name="txtNome" required>
            </div>
            <div class="card-body">
                <label for="lblCpf" class="font-weight-bold text-success">CPF</label>
                <input id="txtCpf" class="form-control border-success" type="text" name="txtCpf">
            </div>
            <div class="card-body">
                <label for="lblEndereco" class="font-weight-bold text-success">Endereço</label>
                <input id="txtEndereco" class="form-control border-success" type="text" name="txtEndereco">
            </div>
            <div class="card-body text-center">
                <input style="margin-right: 30px;" type="submit" class="btn btn-success" id="btGvr" name="btGvr" value="Gravar">
                <input type="button" value="Voltar" class="btn btn-warning" id="btVoltar" name="btVoltar" onclick="javascript: location.href='frmListCliente.php'">
            </div>

        </form>
    </div>

</html>