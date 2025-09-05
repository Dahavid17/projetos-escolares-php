<?php
require_once "funcao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sala = $_POST["sala"] ?? '';
    $nome = $_POST["nome"] ?? '';
    $ra   = $_POST["ra"] ?? '';

    if (!empty($sala) && !empty($nome) && !empty($ra)) {
        gravarChamada($sala, $nome, $ra);
        echo "<h2>Presença registrada com sucesso!</h2>";
    } else {
        echo "<h2>Preencha todos os campos!</h2>";
    }
}

echo '<br><a href="index.php">Voltar</a> | <a href="listar_chamada.php">Ver lista</a>';
?>
