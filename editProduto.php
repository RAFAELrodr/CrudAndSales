<?php 


$id = trim($_POST['id']);
$desc = trim($_POST['txtDescricao']);
$qtd = trim($_POST['txtQtde']);
$valor = trim($_POST['txtValor']);


if(!empty($desc) && !empty($qtd) && !empty($valor)){
    include 'conexaoBanco.php';
    $pdo = Connection::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE produtos SET descricao=?, quantidade=?, valor=? WHERE id=?;";
    $q = $pdo->prepare($sql);
    $q->execute(array($desc, $qtd, $valor, $id));
    
    Connection::disconnect();
}
header("location:frmListProd.php");
?>