<?php
include 'conexaoBanco.php';
session_start();

if(!isset($_SESSION['user']))
  Header("Location: index.html");

$idCliente = $_GET['id'];
$_SESSION['id_cliente'] = $idCliente;

echo $idCliente;
// verifica no banco se $_GET['id'] existe
$pdo = Connection::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT COUNT(*) FROM clientes WHERE id = '$idCliente'";
$res = $pdo->prepare($sql);
$res->execute();
Connection::disconnect();

if ($res->fetchColumn() > 0) {
    //session com id do cliente
    $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT nome FROM clientes where id = '$idCliente'";
        $q = $pdo->prepare($sql);
        $q->execute();
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Connection::disconnect();
    $_SESSION['nome_cliente'] = $data['nome'];

    // verifica no banco se existe venda
    $pdo = Connection::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * from venda";
    $res = $pdo->prepare($sql);
    $res->execute();
    if ($res->fetchColumn() > 0) {

        //seleciona id ultima venda e add mais 1
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT id FROM venda order by id desc limit 1';
        $q = $pdo->prepare($sql);
        $q->execute();
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Connection::disconnect();
        $idVenda = $data['id'] += 1;
        $_SESSION['id_venda'] = $idVenda;

        header("location:frmNovaVenda.php");
    } else {
            $idVenda =1;
            $_SESSION['id_venda'] = $idVenda;
    
            header("location:frmNovaVenda.php");
    }
} else {
    echo'<p>erro ao criar venda</p> <br>
    <a href="frmVendas.php">Voltar</a>';

    }

/* $idCliente = trim($_GET['id']);

if (!empty($idCliente)) {
    include 'conexaoBanco.php';
    $pdo = Connection::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO venda (cliente) VALUES (?);";
    $q = $pdo->prepare($sql);
    $q->execute(array($idCliente)); */
    


?>