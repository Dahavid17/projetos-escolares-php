<?php
    function sauadacao($nome) {
        return "Olá, $nome!";
    }
    echo sauadacao("Davi");
    echo "<br>";
    $variavel = sauadacao("Nome desejado");
    echo "O resultado é: " . $variavel;



?>