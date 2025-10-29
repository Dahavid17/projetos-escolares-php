<?php 

include_once __DIR__ . '/../includes/header.php';


$doces = carregaDados('doces');
?>

<h2>🎉 Bem-vindo ao <?php echo $config['nome_loja']; ?>!</h2>

<p style="text-align: center; font-size: 1.1em; line-height: 1.6;">
    <?php echo $config['slogan']; ?>. Aqui, cada mordida é uma celebração! Utilizamos ingredientes de primeira qualidade para criar brigadeiros, bolos e sobremesas que derretem na boca e aquecem o coração. Venha se adoçar!
</p>

<h3 style="color: var(--cor-primaria); text-align: center; margin-top: 40px;">Nossos Queridinhos da Semana</h3>
<div class="doces-grid">
    <?php
    for ($i = 0; $i < min(2, count($doces)); $i++):
        $doce = $doces[$i];
    ?>
    <div class="doce-card">
        <img src= "img/brigadeiro_tradicional.png" alt="<?php echo $doce['nome']; ?>"> 
        <h3><?php echo $doce['nome']; ?></h3>
        <p><?php echo $doce['descricao']; ?></p>
        <strong>R$ <?php echo number_format($doce['preco'], 2, ',', '.'); ?></strong>
    </div>
    <?php endfor; ?>
</div>

<div style="text-align: center; margin-top: 40px;">
    <a href="doces.php" class="cta-button">VER CARDÁPIO COMPLETO</a>
</div>

<?php 
include_once __DIR__ . '/../includes/footer.php';
?>


As imagens nao funcionaram!