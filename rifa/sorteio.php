<?php
// ATENÇÃO: INICIA A SESSÃO SEMPRE NO TOPO!
session_start();

// Garante que as sessões necessárias existam
if (!isset($_SESSION['historico_participantes'])) {
    $_SESSION['historico_participantes'] = [];
}
if (!isset($_SESSION['sorteado_final'])) {
    $_SESSION['sorteado_final'] = null;
}

$mensagem_sorteio = '';

// Lógica de Sorteio
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sortear_agora'])) {
    
    $participantes_disponiveis = $_SESSION['historico_participantes'];
    
    if (count($participantes_disponiveis) == 0) {
        $mensagem_sorteio = "Ainda não há participantes com números reservados para sortear.";
    } else {
        // Escolhe um índice aleatório do array de participantes
        $indice_ganhador = array_rand($participantes_disponiveis);
        
        // Pega os dados do ganhador
        $ganhador = $participantes_disponiveis[$indice_ganhador];
        $ganhador['data_sorteio'] = date('d/m/Y \à\s H:i:s');

        // Salva o resultado final na sessão
        $_SESSION['sorteado_final'] = $ganhador;
        
        // Atualiza o status do vencedor no histórico
        $_SESSION['historico_participantes'][$indice_ganhador]['status'] = 'VENCEDOR';

        $mensagem_sorteio = "Sorteio Realizado com Sucesso!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteio Final</title>
    <link rel="stylesheet" href="style.css"> 
    
    <style>
        .area-sorteio { max-width: 700px; margin: 40px auto; padding: 20px; text-align: center; }
        .resultado-final { border: 4px solid #f0ad4e; background-color: #fff8e1; padding: 20px; border-radius: 8px; margin-bottom: 30px; }
        .historico-tabela { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .historico-tabela th, .historico-tabela td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        .historico-tabela th { background-color: #333; color: white; }
        .vencedor-row { background-color: #d9edf7; font-weight: bold; }
        .sortear-btn { background-color: #5cb85c; color: white; padding: 15px 30px; border: none; border-radius: 5px; font-size: 1.3em; cursor: pointer; }
    </style>
</head>
<body>
    
    <?php include 'menu.php'; ?>

    <main>
        <div class="area-sorteio">
            <h1>Área do Sorteio</h1>
            
            <form action="sorteio.php" method="POST">
                <input type="hidden" name="sortear_agora" value="1">
                <button type="submit" class="sortear-btn">
                    <?php if ($_SESSION['sorteado_final']): ?>
                        Realizar Novo Sorteio
                    <?php else: ?>
                        SORTEAR AGORA!
                    <?php endif; ?>
                </button>
            </form>
            
            <?php if ($mensagem_sorteio): ?>
                <p style="color: green; margin-top: 15px;"><?php echo $mensagem_sorteio; ?></p>
            <?php endif; ?>

            <?php if ($_SESSION['sorteado_final']): ?>
                <div class="resultado-final">
                    <h2>Último Vencedor!</h2>
                    <p>Número Sorteado: <strong style="font-size: 2em; color: #d9534f;"><?php echo $_SESSION['sorteado_final']['numero']; ?></strong></p>
                    <p>Ganhador: <strong><?php echo $_SESSION['sorteado_final']['nome']; ?></strong></p>
                    <p>Item Selecionado: <strong><?php echo $_SESSION['sorteado_final']['item']; ?></strong></p>
                    <p>Data do Sorteio: <?php echo $_SESSION['sorteado_final']['data_sorteio']; ?></p>
                </div>
            <?php endif; ?>
            
            <h2>Números Reservados e Histórico</h2>
            <?php if (count($_SESSION['historico_participantes']) > 0): ?>
                <table class="historico-tabela">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Nome</th>
                            <th>Item Escolhido</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_reverse($_SESSION['historico_participantes']) as $participante): ?>
                            <tr class="<?php echo ($participante['status'] == 'VENCEDOR') ? 'vencedor-row' : ''; ?>">
                                <td><?php echo $participante['numero']; ?></td>
                                <td><?php echo $participante['nome']; ?></td>
                                <td><?php echo $participante['item']; ?></td>
                                <td><?php echo $participante['status']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p style="margin-top: 20px;"><small>O histórico é salvo por sessão.</small></p>
            <?php else: ?>
                <p>Nenhum número foi reservado ainda. Peça para o público participar!</p>
            <?php endif; ?>
            
        </div>
    </main>
    
</body>
</html>