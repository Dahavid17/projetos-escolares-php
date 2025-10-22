<?php
echo "<h2>Informaçoes do Acesso</h2>";

$ip = $_SERVER['REMOTE_ADDR'];
$navegador = $_SERVER['HTTP_USER_AGENT'];
$servidor = hethostname();
$versaoPHP = phpversion();

echo "IP do usuario: " . $ip . "<br>";
echo "Navegador: " . $navegador . "<br>";
echo "Servidor: " . $servidor . "<br>";
echo "Versao do PHP: " . $versaoPHP . "<br>";