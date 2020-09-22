<?php

$arr = [0, 100, -4, 8, 143, 5, 99, 100];

$length = count($arr);
function swap(&$a, &$b) {
	$temp = $a;
	$a = $b;
	$b = $temp;
}
for ($i = 0; $i < $length-1; $i++) {
	for ($j = $i+1; $j < $length; $j++) {
		if ($arr[$i] < $arr[$j]) {
			swap($arr[$i], $arr[$j]);
		}
	}
}

print_r($arr);
?>