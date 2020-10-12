<?php 

    session_start();
    if(!isset($_SESSION['id_usuario'])) {
        header("location: index.php");
        exit;
    }


?>

<h1>Seja bem vindo!</h1>

<a href="sair.php">Sair!</a>