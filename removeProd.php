<?php 
session_start();
if(!isset($_SESSION['user']))
  Header("Location: index.html");
  
$id = trim($_POST['id']);

if(!empty($id)){
include 'conexaoBanco.php';
$pdo = Connection::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "DELETE FROM produtos WHERE id=?;";
$q = $pdo->prepare($sql);
$q->execute(array($id));
Connection::disconnect();
}
header("location:frmListProd.php");
?>