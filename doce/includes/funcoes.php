<?php

function carregaDados($nomeArquivo) {

    $caminho = __DIR__ . "/../dados/{$nomeArquivo}.json";
    

    if (!file_exists($caminho)) {
        return [];
    }
    
    $conteudo = file_get_contents($caminho);
    if ($conteudo === false) {
        
        return []; 
    }
    
    
    $dados = json_decode($conteudo, true);
    return is_array($dados) ? $dados : [];
}
?>