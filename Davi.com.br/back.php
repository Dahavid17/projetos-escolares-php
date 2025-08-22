<?php
// Pegando os valores enviados pelo formulário
$_Nome  = $_POST['nome'] ?? '';
$_Idade = $_POST['idade'] ?? 0;
$_senha = $_POST['senha'] ?? '';

if ($_Idade < 18) {
    echo $_Nome . ', você é menor de idade.';
} else {
    // Validar senha
    $erros = [];

    if (strlen($_senha) < 5) {
        $erros[] = "A senha deve ter pelo menos 5 caracteres.";
    }
    if (!preg_match('/[A-Z]/', $_senha)) {
        $erros[] = "A senha deve conter pelo menos uma letra maiúscula.";
    }
    if (!preg_match('/[0-9]/', $_senha)) {
        $erros[] = "A senha deve conter pelo menos um número.";
    }

    if (!empty($erros)) {
        echo "Erro na senha:<br>";
        foreach ($erros as $erro) {
            echo "- " . $erro . "<br>";
        }
    } else {
        echo "Senha válida!<br>";

    }
}
?>
