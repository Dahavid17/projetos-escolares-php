<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Calcular Fatorial</h2>
    
    <form method="post">
        <h1>digite um numero:</h1>
        <input type="number" name="numero" required>
        <input type="submit" value="Calcular">
    </form>
    <?php
        if (isset($_POST["numero"])) {
            $num = $_POST["numero"];
            $fatorial = 1;

            for ($i = 1; $i <= $num; $i++) {
                $fatorial *= $i;
            }
            echo "<h3> o Fatorial de $num é: $fatorial</h3>";
        }
?>
</body>
</html>