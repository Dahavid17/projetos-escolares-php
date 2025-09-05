<?php
// Função para gravar chamada no arquivo
function gravarChamada($sala, $nome, $ra) {
    $linha = "Sala: $sala | Nome: $nome | RA: $ra" . PHP_EOL;
    file_put_contents("lista_chamada.txt", $linha, FILE_APPEND);
}

// Função para ler chamadas do arquivo
function listarChamada() {
    if (file_exists("lista_chamada.txt")) {
        return file("lista_chamada.txt", FILE_IGNORE_NEW_LINES);
    } else {
        return [];
    }
}
?>
