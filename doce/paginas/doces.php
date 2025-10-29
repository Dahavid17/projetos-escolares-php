<?php 
include_once __DIR__ . '/../includes/header.php';
$doces = carregaDados('doces');
?>

<h2>🍰 Nosso Cardápio Completo</h2>

<div class="doces-grid">
    <?php if (empty($doces)): ?>
        <p style="text-align: center; grid-column: 1 / -1;">Nenhum doce cadastrado no momento. Verifique se o arquivo dados/doces.json foi carregado corretamente.</p>
    <?php else: ?>
        <?php foreach ($doces as $doce): ?>
        <div class="doce-card">
            <img src="../img/doces_genericas.jpg" alt="<?php echo $doce['nome']; ?>"> 
            <h3><?php echo $doce['nome']; ?></h3>
            <p style="font-size: 0.9em;"><?php echo $doce['descricao']; ?></p>
            <p style="margin-top: 10px;">Categoria: <strong><?php echo $doce['categoria']; ?></strong></p>
            <strong style="font-size: 1.3em; color: var(--cor-primaria);">R$ <?php echo number_format($doce['preco'], 2, ',', '.'); ?></strong>
            
            <a href="cadastro_pedido.php?doce=<?php echo urlencode($doce['nome']); ?>" class="cta-button" style="display: block; margin-top: 15px;">Pedir Este Doce</a>
            
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php 
include_once __DIR__ . '/../includes/footer.php';
?>