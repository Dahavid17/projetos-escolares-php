<?php
require_once "funcao.php";

$lista = listarChamada();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Presença</title>
</head>
<body>
    <h1>Alunos Presentes</h1>
    <ul>
        <?php if (!empty($lista)): ?>
            <?php foreach ($lista as $linha): ?>
                <li><?php echo htmlspecialchars($linha); ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Nenhum aluno presente ainda.</li>
        <?php endif; ?>
    </ul>

    <br>
    <a href="index.php">Voltar</a>
</body>
</html>
