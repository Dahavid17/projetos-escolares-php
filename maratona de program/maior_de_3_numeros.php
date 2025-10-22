<?php
$a = 5;
$b = 8;
$c = 3;

if ($a > $b && $a > $c) {
    $maior = $a;
}elseif ($b > $a && $b > $c) {
    $maior = $b;
}else{
    $maior =$c;
}
echo "Maior=" .$maior;
?>
<?php
$a = 5; $b = 8; $c = 3;
echo "Maior=" .max($a, $b, $c);
?>