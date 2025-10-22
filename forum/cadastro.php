<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarios = simplexml_load_file("usuarios.xml");
    $novo = $usuarios->addChild("usuario");
    $novo->addChild("nome", $_POST["nome"]);
    $novo->addChild("celular", $_POST["celular"]);
    $novo->addChild("email", $_POST["email"]);
    $novo->addChild("senha", md5($_POST["senha"]));
    $usuarios->asXML("usuarios.xml");
    echo "Usuario cadastrado com sucesso! <a href='login.php'>Fazer login</a>";
}else {
?>
nome <input type="text" name="nome" required><br>
celular <input type="text" name="celular" required><br>
email <input type="email" name="email" required><br>
senha <input type="password" name="senha" required><br>
<button type="submit">Cadastrar</button>
</form>
<?php} ?>