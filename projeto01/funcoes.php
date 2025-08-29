<?php
function conecta ($usuario, $senha) {
    if ($usuario === 'admin' && $senha === '1234') {
        header("Location: painel.html");
        exit();
    } else {
        $msg =  urldecode("Login ou senha incorretos.");
        header("Location: index.php?msg=" . urlencode($msg));
        exit();
    }
}
?>