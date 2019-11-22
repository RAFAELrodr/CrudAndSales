<?php 

session_start();
if(!isset($_SESSION['user']))
  Header("Location: index.html");

if(isset($_GET['remover']) && $_GET['remover'] == "carrinho")
{
$idProd = $_GET['id'];
unset($_SESSION['itens'][$idProd]);
echo '<META HTTP-EQUIV="REFRESH" CONTENT="0; URL=frmcarrinho.php"/>';
}
?>