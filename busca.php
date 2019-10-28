<?php 
$desc = trim($_POST['buscar']);

include 'conexaoBanco.php';
$pdo = Connection::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>