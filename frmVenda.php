<?php
/* session_start();
if(!isset($_SESSION['user']))
  Header("Location: index.html"); */
    
    
    ?>
    
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lista de Produtos</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
  <link href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css" rel="stylesheet">
  
  <script src="javascript.js"></script>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
</head>

<body style="background-image: url('frutas.jpg'); background-repeat: no-repeat; background-size: 100%;">
  
<nav class="navbar navbar-expand-lg navbar-light bg-success">
 <a class="navbar-brand" href="#">Navbar</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>
 <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
   <div class="navbar-nav">
     <a class="nav-item nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
     <a class="nav-item nav-link " href="frmListProd.php">Produtos</a>
     <a class="nav-item nav-link" href="frmListCliente.php">Clientes</a>
     <a class="nav-item nav-link disabled" href="#">Vendas</a>
   </div>
 </div>
</nav>
<div class="container">
  <h2>Vendas</h2>
  <form action="busca.php" method="POST">
  <div class="form-group">
    <label for="descricao">Descricao</label>
    <input type="text" class="form-control"  name="pesquisa" id="pesquisa">
  </div>  
</form>
<div id="resultado">
<?php 
  echo ""
/* if($_POST){
  require('conexaoBanco.php');
  $con = Connection::connect();
  $desc=$_POST['pesquisa'];
  $sql = 'SELECT id, descricao, quantidade, valor FROM produtos WHERE descricao = :pesquisa';
  $stmt = $con->prepare($sql);
  $result = $stmt->execute(array(':pesquisa'=>$desc));
  $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);

  if(!empty($rows)){
    count($rows);
    foreach($rows AS $row){
      echo "ID: ".$row->id;
      echo "Descricao: ".$row->descricao."<br>";
    }
  }else {
    echo "Não há dados";
  }
}else{
  echo "";
} */
?> 
</div>


</div>
      
</body>
</html>