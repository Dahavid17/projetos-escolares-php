<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Chamada</title>
</head>
<body>
    <h1>Lista de Chamada</h1>
    <form action="gravar_chamada.php" method="POST">
        <label for="sala">Sala:</label>
        <input type="text" name="sala" id="sala" required><br><br>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="ra">R.A.:</label>
        <input type="text" name="ra" id="ra" required><br><br>

        <button type="submit">Confirmar Presença</button>
    </form>

    <br>
    <a href="listar_chamada.php">Ver lista de presença</a>
</body>
</html>
