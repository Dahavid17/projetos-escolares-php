<?php
$str = "contador";
//a função nativa = preg_match_all()
//realisa buscas com parâramentro
$vogais = preg_match_all('/[aeiou]/i',$str);
echo "Total de vogais: $vogais";
?>
pcc