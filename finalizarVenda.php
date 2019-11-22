<?php
include 'conexaoBanco.php';

session_start();
if(!isset($_SESSION['user']))
  Header("Location: index.html");
/* echo '<pre>';
var_dump($_SESSION['dados']);
echo '<pre>'; */

 $idCliente = $_SESSION['id_cliente'];
    $pdo = Connection::connect();

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO venda () VALUES(null,?, now());";
    $q = $pdo->prepare($sql);
    $q->execute(array($idCliente));    
    Connection::disconnect();

 foreach ($_SESSION['dados'] as $produto) {
    $pdo = Connection::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO itemvenda () VALUES( null,?,?,?,?,?)";
    $q = $pdo->prepare($sql);
    $q->bindParam(1,$produto["id_venda"]);
    $q->bindParam(2,$produto['id_produto']);
    $q->bindParam(3,$produto['quantidade']);
    $q->bindParam(4,$produto['valorUni']);
    $q->bindParam(5,$produto['total']);
    $q->execute();    
    Connection::disconnect();

}
foreach($_SESSION['dados'] as $produto){
    $qtde = $produto['quantidade'];
    $id = $produto['id_produto'];
    $pdo = Connection::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE produtos SET quantidade = quantidade - '$qtde' WHERE id = '$id'" ;
    $q = $pdo->prepare($sql);
    $q->execute();
}
session_destroy();

header("location:frmVendas.php");
