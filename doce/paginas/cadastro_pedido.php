<?php 
include_once __DIR__ . '/../includes/header.php';

$doce_selecionado = isset($_GET['doce']) ? htmlspecialchars($_GET['doce']) : (isset($_POST['produto']) ? htmlspecialchars($_POST['produto']) : 'Nenhum');

$status_mensagem = '';
$clientes = carregaDados('clientes'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome     = trim(htmlspecialchars($_POST['nome']));
    $email    = trim(htmlspecialchars($_POST['email']));
    $telefone = trim(htmlspecialchars($_POST['telefone']));
    $endereco = trim(htmlspecialchars($_POST['endereco']));
    $mensagem = trim(htmlspecialchars($_POST['mensagem']));
    $produto  = trim(htmlspecialchars($_POST['produto']));
    
    $cliente_existente = false;
    foreach ($clientes as &$c) { 
        if ($c['email'] === $email) {
            $cliente_existente = true;
            $c['nome'] = $nome;
            $c['telefone'] = $telefone;
            $c['endereco'] = $endereco;
            break;
        }
    }
    unset($c); 
    
    if (!$cliente_existente) {
        $novo_cliente = [
            'id' => count($clientes) + 1,
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'endereco' => $endereco,
            'data_cadastro' => date("Y-m-d H:i:s")
        ];
        $clientes[] = $novo_cliente;
    }

    $caminho_clientes = __DIR__ . '/../dados/clientes.json';
    if (file_put_contents($caminho_clientes, json_encode($clientes, JSON_PRETTY_PRINT)) === false) {
        $status_mensagem = "erro_cadastro"; 
    } else {
    
    
        $data_hora = date("Y-m-d H:i:s");
        $tipo_registro = ($produto == 'Mensagem Geral - Dúvida') ? 'MENSAGEM GERAL' : 'NOVO PEDIDO';
        
        $conteudo_txt = 
            "--------------------------------------------------\n" .
            "{$tipo_registro} RECEBIDO EM: {$data_hora}\n" .
            "--------------------------------------------------\n" .
            "PRODUTO/ASSUNTO: {$produto}\n" .
            "CLIENTE: {$nome} ({$email})\n" .
            "Telefone: {$telefone}\n" .
            "Endereço: {$endereco}\n" .
            "OBSERVAÇÕES: {$mensagem}\n" .
            "--------------------------------------------------\n\n";

        $caminho_pedidos = __DIR__ . '/../pedidos_joao_docinhos.txt';
        if (file_put_contents($caminho_pedidos, $conteudo_txt, FILE_APPEND | LOCK_EX) !== false) {
            $status_mensagem = "sucesso";
        } else {
            $status_mensagem = "erro_pedido";
        }
    }
}
?>

<h2>📝 Status do Registro</h2>

<?php if ($status_mensagem == "sucesso"): ?>
    <div style="text-align: center; padding: 30px; border: 2px solid green; background-color: #e8f5e9; border-radius: 8px;">
        <h3 style="color: green;">✅ Sucesso!</h3>
        <p><?php echo ($produto == 'Mensagem Geral - Dúvida') ? 'Sua mensagem foi enviada.' : 'Seu pedido foi enviado com sucesso!'; ?></p>
        <p>Agradecemos o contato. Entraremos em contato via **<?php echo $email; ?>** ou **<?php echo $telefone; ?>** em breve.</p>
        <a href="index.php" class="cta-button">Voltar para a Home</a>
    </div>

<?php elseif (strpos($status_mensagem, 'erro') !== false): ?>
    <div style="text-align: center; padding: 30px; border: 2px solid red; background-color: #ffebee; border-radius: 8px;">
        <h3 style="color: red;">❌ Erro no Processamento</h3>
        <p>Desculpe, houve um problema. O motivo mais comum é a **falta de permissão de escrita** nos arquivos `dados/clientes.json` ou `pedidos_joao_docinhos.txt`.</p>
        <p>Por favor, verifique as permissões de escrita (CHMOD 777, se necessário) ou entre em contato diretamente pelo WhatsApp: <?php echo $config['whatsapp']; ?></p>
        <a href="doces.php" class="cta-button">Tentar Outro Pedido</a>
    </div>

<?php else: ?>
    <p style="text-align: center;">Preencha seus dados para finalizar o pedido de **<?php echo $doce_selecionado; ?>** e se cadastrar em nossa loja.</p>

    <div style="max-width: 600px; margin: 20px auto;">
        <form action="cadastro_pedido.php" method="POST">
            <h3 style="color: var(--cor-primaria);">1. Detalhes do Pedido/Mensagem</h3>
            <div class="form-group">
                <label for="produto">Produto Selecionado:</label>
                <input type="text" id="produto" name="produto" value="<?php echo $doce_selecionado; ?>" readonly style="background-color: #f0f0f0; font-weight: bold;">
            </div>
            
            <div class="form-group">
                <label for="mensagem">Detalhes Adicionais (Quantidade, Sabor, Data de Entrega, etc.):</label>
                <textarea id="mensagem" name="mensagem" rows="4" required></textarea>
            </div>

            <h3 style="color: var(--cor-primaria); margin-top: 30px;">2. Cadastro do Cliente</h3>
            <p style="font-size: 0.9em;">Se você já é cadastrado, usaremos estes dados para atualizar seu registro.</p>
            <div class="form-group">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            
            <div class="form-group">
                <label for="email">E-mail (Seu identificador único):</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone/WhatsApp:</label>
                <input type="tel" id="telefone" name="telefone" required>
            </div>
            
            <div class="form-group">
                <label for="endereco">Endereço Completo para Entrega:</label>
                <input type="text" id="endereco" name="endereco" required>
            </div>
            
            <button type="submit" class="cta-button" style="width: 100%;">FINALIZAR PEDIDO E CADASTRAR</button>
        </form>
    </div>

<?php endif; ?>

<?php 
include_once __DIR__ . '/../includes/footer.php';
?>