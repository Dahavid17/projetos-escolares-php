<?php
session_start();
$topicos = simplexml_load_file("topicos.xml");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Forum Simples</title>
</head>
<body>
    <h1>Forum de discusão</h1>

    <nav>
        <a href="cadastro.php">Cadastrar</a>
        <a href="login.php">login</a>
        <a href="criar_topico.php">Criar Topico</a>
    </nav>
    <hr>
    <h2>topicos</h2>
    <ul>
        <?php
        $i = 0;
        foreach ($topicos->topico as $topico) {
            echo "<li>
                <a href='listar.php?id=$i'>" . $t->titulo . "</a>
            </li>"
            $i++;;
        }
        ?>
    </ul>
</body>
</html>