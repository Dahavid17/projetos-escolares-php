<?php
function parOuImpar($numero) {
    if ($numero % 2 == 0) {
        return "Par";
    } else {
        return "Ímpar.";
  }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST['numero'];
        $resultado = parOuImpar($numero);
        echo "O numero $numero é: <strong>$resultado</strong>";
    } else {
        echo "Nenhum dado foi enviado.";

    }
?>  