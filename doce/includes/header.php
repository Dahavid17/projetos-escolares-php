<?php
include_once 'funcoes.php';


$config = carregaDados('configuracoes'); 

if (empty($config)) {
    $config = [
        'nome_loja' => 'João Docinhos', 
        'slogan' => 'Sabor da Festa',
        'whatsapp' => 'N/A', 
        'email_contato' => 'N/A',
        'endereco' => 'N/A',
        'horarios' => ['dias_uteis' => 'N/A', 'sabado' => 'N/A', 'domingo' => 'N/A'],
        'redes_sociais' => ['instagram' => '#', 'facebook' => '#']
    ];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config['nome_loja']; ?> - <?php echo $config['slogan']; ?></title>
    
    <style>
        :root {
            --cor-primaria: #ff4081; 
            --cor-secundaria: #f8bbd0;
            --cor-fundo: #fffafa;
            --cor-texto: #333;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--cor-fundo);
            color: var(--cor-texto);
        }

        header {
            background-color: var(--cor-primaria);
            color: white;
            padding: 15px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        
        
        nav {
            margin-top: 10px;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #d81b60; 
        }
        
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        h2 {
            color: var(--cor-primaria);
            border-bottom: 2px solid var(--cor-secundaria);
            padding-bottom: 10px;
            text-align: center;
            margin-bottom: 30px;
        }
        

        .cta-button {
            display: inline-block;
            background-color: var(--cor-primaria);
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.1em;
            margin-top: 20px;
            transition: background-color 0.3s;
            border: none; /* Adicionado para botões submit */
            cursor: pointer;
        }
        .cta-button:hover {
            background-color: #d81b60;
        }
        
        /* Estilo para a listagem de doces (doces.php) */
        .doces-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .doce-card {
            border: 1px solid var(--cor-secundaria);
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            background-color: white;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }
        .doce-card img {
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: cover;
            border-radius: 4px;
            margin-bottom: 10px;
        }


        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; 
        }
    </style>
    
    </head>
<body>
    <header>
        <h1><?php echo $config['nome_loja']; ?></h1>
        <nav>
            <a href="index.php">HOME</a>
            <a href="doces.php">CARDÁPIO</a>
            <a href="sobre.php">SOBRE</a>
            <a href="contato.php">CONTATO</a>
        </nav>
    </header>
    <div class="container">