<?php
require_once("funcao_media.php");

$valor1 = $_POST['valor1'] ?? 0;
$valor2 = $_POST['valor2'] ?? 0;
$valor3 = $_POST['valor3'] ?? 0;

$media = calcula_media($valor1, $valor2, $valor3);

// redireciona para index_media.php mostrando o resultado
header("Location: index_media.php?media=" . urlencode($media));
exit();
?>