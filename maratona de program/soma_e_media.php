<?php
$numeros = [1, 2,10, 4, 6];

//inicializa as variaveis
$soma = 0;
$maior = $numeros[0];
$menor = $numeros[0];
$quantidade = 0;
//percorre cada numero
foreach ($numeros as $n) {
    $soma += $n;
    $quantidade++;
    //verifica se é maior
    if ($n > $maior) {
        $maior = $n;
    }
    //verifica se é menor
    if ($n < $menor) {
        $menor = $n;
    }
}
//calcula media
$media = $soma/$quantidade;
//exibe resultados
echo "Soma=$soma, Media=$media, Maior=$maior, Menor=$menor";
?>