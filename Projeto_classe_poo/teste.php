<?php

require_once "Usuario.php";
require_once "Professor.php";
require_once "Aluno.php";

$professor1 = new Professor("Calaos Silva", "carlos@escola.com", "Matematica");
$professor2 = new Professor("Mariana Souza", "mariana@escola.com", "Fisica");

$aluno1 = new aluno("Joao Santos", "joao@aluno.com", "2025A001");
$aluno2 = new Aluno("Ana Pereira", "ana@aluno.com", "2025A002");

echo "<h2>Professores</h2>";
echo $professor1->exibirInfo() . "<br>";
echo $professor1->darAula() . "<br><br>";

echo $professor2->exibirInfo() . "<br>";
echo $professor2->darAula() . ",<br><br>";


echo "<h2>Alunos</h2>";
echo $aluno1->exibirInfo() . "<br>";
echo $aluno1->estudar() . "<br><br>";

echo $aluno2->exibirInfo() . "<br>";
echo $aluno2->estudar() . "<br><br>";
?>