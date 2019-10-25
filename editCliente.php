<?php 


$id = trim($_POST['id']);
$nome = trim($_POST['txtNome']);
$cpf = trim($_POST['txtCpf']);
$end = trim($_POST['txtEndereco']);


if(!empty($nome) && !empty($cpf) && !empty($end)){
    include 'conexaoBanco.php';
    $pdo = Connection::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE clientes SET nome=?, cpf=?, endereco=? WHERE id=?;";
    $q = $pdo->prepare($sql);
    $q->execute(array($nome, $cpf, $end, $id));
    
    Connection::disconnect();
}
header("location:frmListCliente.php");
?>