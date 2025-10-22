<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="style.css"> 
    
    <style>
        .botao-sorteio-container {
            text-align: center;
            margin-top: 50px;
            padding: 30px;
            background-color: #f0f0f0;
            border-radius: 10px;
        }
        .botao-sorteio {
            display: inline-block;
            background-color: #d9534f; /* Vermelho forte */
            color: white;
            padding: 20px 40px;
            text-decoration: none;
            font-size: 1.5em;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .botao-sorteio:hover {
            background-color: #c9302c; /* Vermelho mais escuro no hover */
        }
    </style>
    
</head>
<body>
    
    <?php include 'menu.php'; ?>

    <main style="padding: 20px;">
        <h1>Seja Bem-vindo!</h1>
        <p>Aproveite nosso site e confira a nossa grande promoção de sorteio logo abaixo!</p>
        
    <div class="botao-sorteio-container">
        <a href="participar.php" class="botao-sorteio">
            🏆 Ir para o Sorteio Agora!
        </a>
    </div>
        


    </main>
    
</body>
</html>