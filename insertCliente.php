<?php
if(!isset($_SESSION['user']))
Header("Location: index.html");

$nome = trim($_POST['txtNome']);
$cpf = trim($_POST['txtCpf']);
$end = trim($_POST['txtEndereco']);

if(!empty($nome) && !empty($cpf) && !empty($end)){
    include 'conexaoBanco.php';
    $pdo = Connection::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO clientes (nome, cpf, endereco) VALUES (?,?,?);";
    $q = $pdo->prepare($sql);
    $q->execute(array($nome, $cpf, $end));
    Connection::disconnect();
}

header("location:frmListCliente.php");
?>