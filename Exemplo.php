<?php
//$soma = function($a, $b):int{
//    return $a+$b;
//};
//echo "<br>";
//var_dump($soma(5,6));
$soma = fn(int $a, int $b):int =>$a+$b;
echo "<br/>";
var_dump($soma(5,6));
?>
