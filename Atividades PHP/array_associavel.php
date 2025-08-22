<?php

    $pessoa = ["nome" => "Davi",
    "idade" => 16,
    "cidade" => "Arceburgo",
    "escola" => "Sesi-Senai",
    "altura" => 1.80,
    "peso" => 61,00,
];
    echo "exemplo 1<br>";
    echo "<br>";
    echo $pessoa["nome"] . " tem " . $pessoa["idade"] . " anos.<br>";
    echo "<br>";

    echo "exemplo 2<br>";
    echo "<br>";
    echo "Ola " . $pessoa["nome"] . ", você esta com " . $pessoa["idade"] . " anos!<br>";
    echo "<br>";

    echo "exemplo 3<br>";
    echo "<br>";
    echo "Ola " . $pessoa["nome"] . ", você tem " . $pessoa["idade"] . " anos, mora em " . $pessoa["cidade"] . ", estuda no " . $pessoa["escola"] . ", tem " . $pessoa["altura"] . " de altura e pesa " . $pessoa["peso"] . "kg.<br>";
    echo "<br>";

    echo "exemplo 4<br>";
    echo "<br>";

    for ($i = 0; $i < count($pessoa); $i++){
        echo "Atributo " . $i+1 . " : ".$pessoa[$i] . "<br>";
    }

    ?>