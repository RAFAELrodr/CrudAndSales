<?php
 include 'conexaoBanco.php';
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