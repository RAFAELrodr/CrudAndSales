<?php
include 'conexaoBanco.php';
session_start();

if(!isset($_SESSION['user']))
  Header("Location: index.html");
  
if (!isset($_SESSION['itens'])) {
    $_SESSION['itens'] = array();
}
if (isset($_GET['add']) && $_GET['add'] == "carrinho") {
    //Add a ListaVenda
    $idProd = $_GET['id'];
    if (!isset($_SESSION['itens'][$idProd])) {
        $_SESSION['itens'][$idProd] = 1;
    } else {
        $_SESSION['itens'][$idProd] += 1;
    }
}
$idVenda = $_SESSION['id_venda'];
?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista de Produtos</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css">
    <link href="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body style="background-image: url('frutas.jpg'); ; background-size: 60%;">
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="home.php">Home </a>
                <a class="nav-item nav-link" href="frmListProd.php">Produtos</a>
                <a class="nav-item nav-link" href="frmListCliente.php">Clientes</a>
                <a class="nav-item nav-link" href="frmVendas">Vendas</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="container col-md-4">
            <h1 style="margin-bottom: 50px; padding:10px;" class="bg-white text-center text-success">Lista de Itens Vendas</h1>
        </div>
        <div class=" col-3">
    <h5 style="margin-bottom: 0px; padding:10px;" class="bg-white text-left text-success"><strong>Venda # </strong><?php echo $_SESSION['id_venda']; ?> </h5>
    <h5 style="margin-bottom: 20px; padding:10px;" class="bg-white text-left text-success"><strong>Cliente: </strong><?php echo $_SESSION['nome_cliente']; ?> </h5>
  </div>
        <button style="margin-bottom: 20px; padding:10px;" class="btn btn-info" onclick="javascript:location.href='frmNovaVenda.php'">Adicinar Item</button>
        <button style="margin-bottom: 20px; padding:10px;" class="btn btn-info" onclick="javascript:location.href='finalizarVenda.php'">Finalizar</button>

        <?php
        //Exbibe Lista venda
        if (count($_SESSION['itens']) == 0) { ?>
            <p style="margin-bottom: 20px; padding:10px;" class="bg-white text-center text-success">lista vazia</p>
        <?php } else { ?>
            <div class="container col-8">
            <table id="tabNovaVenda" class="table table-hover table-striped bg-light " style="text-align: left;">
                <thead>
                    <tr>
                        
                        <th scope="col">Descricao</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col"> Valor</th>
                        <th scope="col"> Total Item</th>
                        <th></th>

                    </tr>
                </thead>


                <tbody id="tbody">
                    <?php

                        $_SESSION['dados'] = array();
                        

                        $pdo = Connection::connect();
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        foreach ($_SESSION['itens'] as $idProd => $quantidade) {

                            $sql = "SELECT * FROM produtos WHERE id=?";
                            $q = $pdo->prepare($sql);
                            $q->bindParam(1, $idProd);
                            $q->execute();
                            $produto = $q->fetchAll();
                            $totaItem = $quantidade * $produto[0]["valor"];
                            ?>
                        <tr>
                            
                            <td><?php echo $produto[0]["descricao"] ?></td>
                            <td><?php echo $quantidade ?></td>
                            <td><?php echo $produto[0]["valor"] ?></td>
                            <td><?php echo $totaItem ?></td>
                            <td><?php echo '<a role="button" class="btn btn-success" href="removerListaProd.php?remover=carrinho&id=' . $idProd . '">Remover</a>'; ?></td>
                        </tr>

                    <?php
                    
                            array_push(
                                $_SESSION['dados'],
                                array('id_venda' => $idVenda,
                                'id_produto' => $idProd,
                                'quantidade' => $quantidade,
                                'valorUni' => $produto[0]["valor"],
                                'total' => $totaItem)
                            );
                        } 
                       ?>
                </tbody>

            </table>
            </div>
        <?php  };
       /*  echo '<pre>';
        var_dump($_SESSION['dados']);
        echo '<pre>'; */
        ?>

    </div>
</body>

</html>