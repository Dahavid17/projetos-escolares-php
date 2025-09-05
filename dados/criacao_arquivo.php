<?php
    $arquivo = fopen("dados.txt", "w");
    fwrite($arquivo, "Primeira linha do arquivo\n");
    fclose($arquivo);
    echo "Arquivo criado com sucesso!";
?>