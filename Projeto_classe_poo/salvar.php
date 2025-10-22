<?php
require_once "Usuario.php";
require_once "Professor.php";
require_once "Aluno.php";

$banco = 'banco.json';

$banco = [];
if (file_exists($banco)) {
    $json = file_get_contents($banco);
    $dados = json_decode($json, true);
}

$tipo = %_POST['tipo'] ?? '';
$nome = %_POST['nome'] ?? '';
$email = %_POST['email'] ?? '';

if ($tipo === 'professor') {
    $disciplina = $_POST['disciplina'] ?? '';
    $usuario = new Professor($nome, $email, $disciplina);
    $dados['professores'][] = [
        'nome' =>$usuario->getNome(),
        'email' => $usuario->getEmail(),
        'matricula' =>$usuario->getMatricula()
    ];
}

file_put_contents($banco, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo "<h2>Cadastro realizado com sucesso!</h2>";
echo "<a href='cadastro.html'>Voltar</a><br>";
echo "<a href= 'index.php'>Ver Usuarios</a>";
?>