<?php
// ATENÇÃO: INICIA A SESSÃO SEMPRE NO TOPO!
session_start(); 

// Inicializa a lista de números e o histórico se não existirem
if (!isset($_SESSION['numeros_sorteados'])) {
    $_SESSION['numeros_sorteados'] = [];
}
if (!isset($_SESSION['historico_participantes'])) {
    $_SESSION['historico_participantes'] = [];
}

$erro = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim(htmlspecialchars($_POST['nome']));
    $item = htmlspecialchars($_POST['item_sorteio']);
    $numero_escolhido = (int)$_POST['numero_escolhido'];

    // Validações
    if (empty($nome) || empty($item) || $numero_escolhido < 1 || $numero_escolhido > 1000) {
        $erro = "Por favor, preencha todos os campos corretamente.";
    } elseif (in_array($numero_escolhido, $_SESSION['numeros_sorteados'])) {
        $erro = "O número {$numero_escolhido} já foi escolhido. Escolha outro!";
    } else {
        // Adiciona o número e o participante ao histórico e à lista de números usados
        $_SESSION['numeros_sorteados'][] = $numero_escolhido;
        $_SESSION['historico_participantes'][] = [
            'numero' => $numero_escolhido,
            'nome' => $nome,
            'item' => $item,
            'status' => 'participante'
        ];
        
        // Redireciona o usuário para a página de sorteio para evitar reenvio do formulário
        header("Location: sorteio.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participar do Sorteio</title>
    <link rel="stylesheet" href="style.css"> 
    
    <style>
        .form-participacao { max-width: 400px; margin: 40px auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
        .form-participacao label { display: block; margin-top: 15px; font-weight: bold; }
        .form-participacao input, .form-participacao select { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .form-participacao button { background-color: #28a745; color: white; padding: 12px 20px; margin-top: 20px; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 1.1em; }
        .erro-msg { color: #d9534f; margin-top: 10px; font-weight: bold; }
    </style>
</head>
<body>
    
    <?php include 'menu.php'; ?>

    <main>
        <div class="form-participacao">
            <h1>Cadastre-se para o Sorteio</h1>
            
            <?php if ($erro): ?>
                <p class="erro-msg"><?php echo $erro; ?></p>
            <?php endif; ?>
            
            <form action="participar.php" method="POST">
                
                <label for="nome">Seu Nome:</label>
                <input type="text" id="nome" name="nome" required value="<?php echo isset($nome) ? $nome : ''; ?>">

                <label for="item_sorteio">Item que Deseja Concorrer:</label>
                <select name="item_sorteio" id="item_sorteio" required>
                    <option value="">-- Selecione o item --</option>
                    <option value="Bicicleta">Bicicleta</option>
                    <option value="Tablete">Tablete</option>
                    <option value="Forno Elétrico">Forno Elétrico</option>
                </select>
                
                <label for="numero_escolhido">Escolha um Número (1 a 1000):</label>
                <input type="number" id="numero_escolhido" name="numero_escolhido" min="1" max="1000" required>
                
                <button type="submit">Reservar Meu Número</button>
            </form>
            
        </div>
    </main>
    
</body>
</html>