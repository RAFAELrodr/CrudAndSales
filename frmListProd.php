 <?php
  /* session_start();
  if (!isset($_SESSION['user']))
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
         <a class="nav-item nav-link disabled" href="#">Disabled</a>
       </div>
     </div>
   </nav>
   <input  style="margin-left:50px; margin-top: 40px;" type="button" class="btn btn-info btn-lg" id="btNovo" value="Adicionar Produto" onclick="javascript: location.href='frmInsertProd.html'">

   <div class="container col-md-4">
   <h1 style="margin-bottom: 50px; padding:10px;" class="bg-white text-center text-success">Lista de Produtos</h1>
   </div>
   
   <div class="form-group">
          
     <table class=" container table table-hover table-striped bg-light" id="table" data-toggle="table" data-sort-class="table-active" data-sortable="true" data-url="selectProd.php">
       <thead class="bg-success">
         <tr>
           <th class="text-center" data-field="id" data-sortable="true">ID</th>
           <th class="text-center" data-field="descricao" data-sortable="true">DESCRIÇÃO</th>
           <th class="text-center" data-field="quantidade" data-sortable="true">QUANTIDADE</th>
           <th class="text-center" data-field="valor" data-sortable="true">VALOR</th>
           <th  class="text-center" data-field="remAndEdit" data-formatter="operateFormatter" data-events="operateEvents"></th>
           <!-- <th class="text-center" data-field="remove" data-formatter="operateFormatterr" data-events="operateEvents"></th> -->
         </tr>

       </thead>
     </table>

   </div>

   <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
   <script src="https://unpkg.com/bootstrap-table@1.15.4/dist/bootstrap-table.min.js"></script>

   <script>
     var $table = $('#table')

     function operateFormatter(value, row, index) {
       return [
         '<input style="margin-right:50px" type="submit" class="text-right btn btn-info edit" value="Editar">',

         '<input type="submit" class=" tetx-left btn btn-danger remove" value="Remover">',
         
       ].join('')
     }


     window.operateEvents = {
       'click .edit': function(e, value, row, index) {
          window.location.href = "frmEditProd.php?id="+row['id'];
          
       },
       'click .remove': function(e, value, row, index) {
        window.location.href = "frmRemoveProd.php?id="+row['id'];
       }
     }
   </script>
 </body>

 </html>