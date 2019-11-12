<?php
$idCliente = trim($_GET['id']);

if (!empty($idCliente)) {
    include 'conexaoBanco.php';
    $pdo = Connection::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO venda (cliente) VALUES (?);";
    $q = $pdo->prepare($sql);
    $q->execute(array($idCliente));

    
}

header("location:frmNovaVenda.php");
