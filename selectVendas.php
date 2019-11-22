<?php
 include 'conexaoBanco.php';

 session_start();
if(!isset($_SESSION['user']))
  Header("Location: index.html");
  
 $pdo = Connection::connect();
 $sql = 'SELECT * FROM venda;';
 $array = [];
 foreach ($pdo->query ($sql) as $row){
   $data = [
     'id' => $row['id'],
     'cliente' => $row['cliente'],
     'data' => $row['data']
    ];
   $array[] = $data;
 }
 Connection::disconnect();
echo json_encode($array);
?>