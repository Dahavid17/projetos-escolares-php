<?php 
include_once __DIR__ . '/../includes/header.php';

?>

<h2>💌 Fale Conosco</h2>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; max-width: 900px; margin: 0 auto;">
    
    <div>
        <h3 style="color: var(--cor-primaria);">Envie sua Dúvida</h3>
        
        <form action="cadastro_pedido.php" method="POST">
             <input type="hidden" name="produto" value="Mensagem Geral - Dúvida">
             <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
             <div class="form-group">
                <label for="telefone">Telefone/WhatsApp:</label>
                <input type="tel" id="telefone" name="telefone" required>
            </div>
            
             <input type="hidden" name="endereco" value="Não Aplicável (Mensagem Geral)">
            
            <div class="form-group">
                <label for="mensagem">Sua Mensagem:</label>
                <textarea id="mensagem" name="mensagem" rows="5" required></textarea>
            </div>
            
            <button type="submit" class="cta-button">Enviar Contato</button>
        </form>
    </div>
    
    <div>
        <h3 style="color: var(--cor-primaria);">Nossos Dados</h3>
        <p><strong>WhatsApp:</strong> <?php echo $config['whatsapp']; ?></p>
        <p><strong>E-mail:</strong> <a href="mailto:<?php echo $config['email_contato']; ?>" style="color: var(--cor-primaria);"><?php echo $config['email_contato']; ?></a></p>
        
        <h3 style="color: var(--cor-primaria);">Horário de Funcionamento</h3>
        <p>Segunda a Sexta: <?php echo $config['horarios']['dias_uteis']; ?></p>
        <p>Sábados: <?php echo $config['horarios']['sabado']; ?></p>
        <p>Domingos e Feriados: <?php echo $config['horarios']['domingo']; ?></p>
        
        <h3 style="color: var(--cor-primaria);">Endereço</h3>
        <p><?php echo $config['endereco']; ?></p>
    </div>

</div>

<?php 
include_once __DIR__ . '/../includes/footer.php';
?>