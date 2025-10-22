<?php
session_start();
$topicos = simplexml_load_file("topicos.xml");
$i = 0;
foreach ($topicos->topico as $t) {
    echo "<h2>" . $t->titulo . "</h2>";
    echo "<p>" . $t->mensagem . "</p>";
    echo "<small>Autor: " . $t->autor . "</small><br>";
    echo "<h3>Comentários:</h3>";
    $j = 0;
    foreach ($t->comentarios->comentario as $c) {
        echo "<p><b>" . $c->nome . ":</b> " . $c->mensagem;
        if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] === $t->autor) {
            echo " <a href='excluir.php?id=$i&comentario_id=$j'>Excluir</a>";
        }
        echo "</p>";
        $j++;
    }
    echo "<form method='post' action='comentar.php'>
        <input type='hidden' name='id' value='$i'>
        Nome: <input type='text' name='nome' required>
        Mensagem: <input type='text' name='mensagem' required>
        <button type='submit'>Comentar</button>
    </form>";
    ++$i;