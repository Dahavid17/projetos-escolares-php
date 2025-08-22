<?php
 function media () {
    $n1 = $_POST ['numero1'];
    $n2 = $_POST ['numero2'];
    $n3 = $_POST ['numero3'];

    $media = ($n1 + $n2 + $n3) / 3;
    echo "A média é: " . $media;
}
media()

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n1 = $_POST['numero1'];
    $n2 = $_POST['numero2'];
    $n3 = $_POST['numero3'];

    $resultado = media($n1, $n2, $n3);

    echo "<h2> Resultado da Média</h2>";
    echo "Os numeros digitados foram: $n1, $n2, $n3<br>";
    echo "A média é: <strog>" .number_format($resultado, 2, ',', ',') . "</strong>";
} else {
    echo "Nenhum dado foi enviado.";
}

?>