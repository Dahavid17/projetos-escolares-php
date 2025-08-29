<form action= "login.php" method = "post">
    login <br>
    <input type="text" name="login"> <br>
    senha <br>
    <input type="password" name="senha"> <br><br>
    <input type="submit" value="Entrar">
</form>

<?php
if (isset($_GET['msg'])) {
    echo "<p style='color: red;'>" . htmlspecialchars($_GET['msg']) . "</p>";
}
?>