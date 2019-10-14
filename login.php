<?php
    $user = trim($_POST['user']);
    $pwd = trim($_POST['pwd']);

    include 'conexaoBanco.php';

    $pdo = Connection::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM usuarios WHERE user=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($user));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $checkPwd = $data['pwd'];
    Connection::disconnect();

    if(md5($pwd)==$checkPwd){
        session_start();
        $_SESSION['user'] = $user;
        Header("Location: home.php");
    }
?>