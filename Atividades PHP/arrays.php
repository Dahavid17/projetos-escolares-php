<?php
$frutas = ["maçã", "banana", "laranja"];

echo "codigo 1:<br>";
    for ($i = 0; $i < count($frutas); $i++){
        echo "Frutas " . $i+1 . " : ".$frutas[$i] . "<br>";
    }

    echo "<br>";
    echo "codigo 2:<br>";
    $i = 0;
    for ($i = $i; $i <= 3; $i++){
        $n = $i + 1;
        echo "Frutas $n: $frutas[$i]<br>";
    }    
?>