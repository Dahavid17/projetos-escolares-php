<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calcular Média</title>
</head>
<body>
    <h2>Digite as 3 notas:</h2>
    <form action="calcular_media.php" method="post">
        Valor 1: <input type="number" name="valor1" step="0.01" required><br><br>
        Valor 2: <input type="number" name="valor2" step="0.01" required><br><br>
        Valor 3: <input type="number" name="valor3" step="0.01" required><br><br>
        <input type="submit" value="Calcular Média">
    </form>

    <?php
    if (isset($_GET['media'])) {
        $media = number_format($_GET['media'], 2, ',', '.');
        echo "<h3>Sua média é: <span style='color:blue;'>$media</span></h3>";
    }
    ?>
</body>
</html>