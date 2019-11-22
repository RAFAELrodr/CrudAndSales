<?php
session_start();
if(!isset($_SESSION['user']))
  Header("Location: index.html");
  
 include 'conexaoBanco.php';
 $pdo = Connection::connect();
 $sql = 'SELECT * FROM clientes;';
 $array = [];
 foreach ($pdo->query ($sql) as $row){
   $data = [
     'id' => $row['id'],
     'nome' => $row['nome'],
     'cpf' => $row['cpf'],
     'endereco' => $row['endereco']
    ];
   $array[] = $data;
 }
 Connection::disconnect();
echo json_encode($array);
?>