<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Tabuada em PHP</title>
</head>
<body>
    <h2>Gerar Tabuada</h2>
    <form method="post">
        Digite um número: 
        <input type="number" name="numero" required>
        <button type="submit">Gerar</button>
        
    </form>

    <?php
        $numero = $_POST['numero'];

        echo "<h3>Tabuada do $numero</h3>";

        for ($i = 10; $i <= ; $i++) {
            $resultado = $numero * $i;
            echo "$numero x $i = $resultado <br>";
        }
    ?>
</body>
</html>
