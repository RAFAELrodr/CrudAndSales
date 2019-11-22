<?php
if(!isset($_SESSION['user']))
Header("Location: index.html");

$desc = trim($_POST['txtDescricao']);
$qtd = trim($_POST['txtQtde']);
$valor = trim($_POST['txtValor']);

if(!empty($desc) && !empty($qtd) && !empty($valor)){
    include 'conexaoBanco.php';
    $pdo = Connection::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO produtos (descricao, quantidade, valor) VALUES (?,?,?);";
    $q = $pdo->prepare($sql);
    $q->execute(array($desc, $qtd, $valor));
    Connection::disconnect();
}

header("location:frmListProd.php");
?>