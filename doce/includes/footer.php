</div> <footer>
        <div style="text-align: center; padding: 15px; background-color: var(--cor-primaria); color: white; margin-top: 30px;">
            <p>&copy; <?php echo date("Y"); ?> <?php echo $config['nome_loja']; ?>. Todos os direitos reservados.</p>
            <p>Siga-nos: 
                <a href="<?php echo isset($config['redes_sociais']['instagram']) ? $config['redes_sociais']['instagram'] : '#'; ?>" style="color: white; margin: 0 5px;">Instagram</a> |
                <a href="<?php echo isset($config['redes_sociais']['facebook']) ? $config['redes_sociais']['facebook'] : '#'; ?>" style="color: white; margin: 0 5px;">Facebook</a>
            </p>
        </div>
    </footer>
</body>
</html>