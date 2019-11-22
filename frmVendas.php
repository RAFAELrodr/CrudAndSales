<?php
session_start();
  if (!isset($_SESSION['user']))
    Header("Location: index.html");
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
                <a class="nav-item nav-link" href="frmVendas.php">Vendas</a>
            </div>
        </div>
    </nav>
    <!-- <input  style="margin-left:50px; margin-top: 40px;"
    type="button" class="btn btn-info btn-lg" 
    id="btNovo" value="Nova Venda" onclick="javascript: location.href='frmNovaVenda.php'"> -->
    <a style="margin-left:50px; margin-top: 40px;" href="#newModal" class="btn btn-info btn-lg" data-toggle="modal">Nova Venda</a>



    <div id="newModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Selecione o Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input name="consulta" id="txt_consulta" placeholder="Consultar Cliente" type="text" class="form-control">
                    </div>

                    <div class="container">
                        <?php
                        include 'conexaoBanco.php';
                        $pdo = Connection::connect();
                        $sql = 'SELECT * FROM clientes;';

                        ?>

                        <table id="tabNovaVenda" class="table table-hover table-striped bg-light " style="text-align: left;">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>


                            <tbody id="tbody">
                                <?php foreach ($pdo->query($sql) as $row) {
                                    $id = $row['id'];
                                    $nome = $row['nome'];
                                    $cpf = $row['cpf'];
                                    ?>
                                    <tr>

                                        <th scope="row"><?php echo $id ?></th>
                                        <td><?php echo $nome ?></td>
                                        <td><?php echo $cpf ?></td>
                                        <td><input type="button" class=" tetx-left btn btn-danger venda" value="Add"
                                         onclick="javascript: location.href = 'insertVenda.php?id=' +<?php echo $row['id'] ?>"></td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" onclick="javascript: location.href='frmInsertCliente.html'">Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container col-md-4">
        <h1 style="margin-bottom: 50px; padding:10px;" class="bg-white text-center text-success">Historico de Vendas</h1>
    </div>

    <div class="form-group">

        <table class=" container table table-hover table-striped bg-light" id="table" data-toggle="table" data-sort-class="table-active" data-sortable="true" data-url="selectVendas.php">
            <thead class="bg-success">
                <tr>
                    <th class="text-center" data-field="id" data-sortable="true">ID</th>
                    <th class="text-center" data-field="cliente" data-sortable="true">Cliente nº</th>
                    <th class="text-center" data-field="data" data-sortable="true">Data</th>
                    <!-- <th class="text-center" data-field="remAndEdit" data-formatter="operateFormatter" data-events="operateEvents"></th> -->
                    <!-- <th class="text-center" data-field="remove" data-formatter="operateFormatterr" data-events="operateEvents"></th> -->
                </tr>

            </thead>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script>

    <!-- <script>
        var $table = $('#table')

        function operateFormatter(value, row, index) {
            return [
                '<input style="margin-right:50px" type="submit" class="text-right btn btn-info edit" value="Editar">',

                '<input type="submit" class=" tetx-left btn btn-danger remove" value="Remover">',

            ].join('')
        }


        window.operateEvents = {
            'click .edit': function(e, value, row, index) {
                window.location.href = "frmEditProd.php?id=" + row['id'];

            },
            'click .remove': function(e, value, row, index) {
                window.location.href = "frmRemoveProd.php?id=" + row['id'];
            }
            
        }
    </script> -->

    <script>
        $(document).ready(function() {
            $("#txt_consulta").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>