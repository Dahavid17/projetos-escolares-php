<?php
$PastaDestino="upload/";

if (isset($_FILES["arquivo"]) && $_FILES["arquivo"]["error"] == 0) {
    $nomeArquivo = basename($_FILES["arquivo"]["name"]);
    $caminhoCompleto = $PastaDestino . $nomeArquivo;

    $tipoArqvuivo = strtolower(pathinfo($caminhoCompleto, PATHINFO_EXTENSION));
    $tiposPermitidos = array("jpg", "jpeg", "png", "gif");

    if (in_array($tipoArqvuivo, $tiposPermitidos)) {
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $caminhoDestino)) {
            echo "O arquivo " . htmlspecialchars($nomeArquivo) . " foi enviado com sucesso.";
            echo "<br><a href='index.php'>Voltar para a galeria</a>";
        } else {
            echo "Erro ao mover o arquivo para o diretório de destino.";
        }
    } else {
        echo "Tipo de arquivo não permitido. Apenas arquivos JPG, JPEG, PNG e GIF são aceitos.";
    }
} else {
    echo "Nenhum arquivo foi enviado ou ocorreu um erro no upload.";
}
?>