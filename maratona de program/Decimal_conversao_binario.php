<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $decimal =(int) $_POST['numero'];
    $binario = decbin($decimal);

    echo "<h2> NUMERO $decimal em binario e: $binario</h2>";
}
?>
<form method="post">
    <label>Digite um numero decimal: </label>
    <input type="number" name="numero" min="0" required>
    <button type = "submit">Converter</button>
</form>