<?php    
    require_once ("funcoes.php");

    $usuario = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    conecta($usuario, $senha);


?>

