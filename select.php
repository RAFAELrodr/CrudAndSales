<?php
 include 'conexaoBanco.php';
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