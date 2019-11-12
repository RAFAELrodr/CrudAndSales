<?php
    include('conectar.php');

    $campo="%".$_POST['campo']."%";
    
    $sql=$mysqli->prepare("SELECT * FROM produtos WHERE descricao LIKE ?");
    $sql->bind_param("s",$campo);
    $sql->execute();
    $sql->bind_result($id,$desc,$qtde,$valor);
    
    echo "
        <table>
            <thead>
            <tr>
                <td>Id</td>
                <td>Descricao</td>
                <td>Valor</td>
            </tr>
            </thead>
    
            <tbody>
            ";
    
            while($sql->fetch()){
    
            echo "
            <tr>
                <td>$id</td>
                <td>$desc</td>
                <td>$valor</td>
            </tr>
            ";
            }
    
            echo "
            </tbody>
        </table>
    ";
?>