<?php 
    include('conexaoBanco.php');

    $pesquisa= "%".$_POST['pesquisa']."%";
    $pdo = Connection::connect();
    $sql = $pdo->prepare( "SELECT * FROM produtos WHERE produto LIKE ?");
    //$pesquisa="%".$pesquisa."%";
    $sql->bindParam(1, $pesquisa, PDO::PARAM_STR);
    $sql->execute(array($pesquisa));
    $rows=$sql->fetch(PDO::FETCH_ASSOC);
    
     echo "
    <table>
        <thead>
        <tr>
            <td>Id</td>
            <td>Produtos</td>
            <td>Valor</td>
        </tr>
        </thead>

        <tbody>
        ";
        foreach ($rows as $row){
      
            $id = $row['id'];
            $desc = $row['descricao'];
            $qtde = $row['quantidade'];
            $valor = $row['valor'];
                 
          echo "
            <tr>
                <td>$id</td>
                <td>$desc</td>
                <td>$qtde</td>
                <td>$valor</td>
            </tr>
        ";
        }
        echo "
        </tbody>
    </table>
    "; 
?>