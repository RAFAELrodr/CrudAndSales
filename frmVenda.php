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
  
  <div class="form-group input-group">
 <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
 <input name="consulta" id="txt_consulta" placeholder="Consultar" type="text" class="form-control">
 </div>

<div >
<?php 
    include 'conexaoBanco.php';
    $pdo = Connection::connect();
    $sql = 'SELECT * FROM produtos;';
    
    ?>
    
        <table id="tabela" class="container table table-hover table-striped bg-light">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Produtos</td>
                    <td>Quantidade</td>
                    <td>Valor</td>
                </tr>
            </thead>
            <?php foreach ($pdo->query ($sql) as $row){
               $id = $row['id'];
               $desc = $row['descricao'];
               $qtde = $row['quantidade'];
               $valor = $row['valor'];
              ?>
            
            <tbody>
            
        <tr>

            <td><?php echo $id?></td>
            <td><?php echo $desc?></td>
            <td><?php echo $qtde?></td>
            <td><?php echo $valor?></td>
        </tr>
            
    </tbody>
    <?php }?>
</table>
</div>


</div>
      
</body>

<script>
  $('input#txt_pesquisa').quicksearch('table#tabela tbody tr');
</script>
</html>