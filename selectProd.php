<?php
 include 'conexaoBanco.php';
 session_start();
if(!isset($_SESSION['user']))
  Header("Location: index.html");
  
 $pdo = Connection::connect();
 $sql = 'SELECT * FROM produtos;';
 $array = [];
 foreach ($pdo->query ($sql) as $row){
   $data = [
     'id' => $row['id'],
     'descricao' => $row['descricao'],
     'quantidade' => $row['quantidade'],
     'valor' => $row['valor']
    ];
   $array[] = $data;
 }
 Connection::disconnect();
echo json_encode($array);
?>