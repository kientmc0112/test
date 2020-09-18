<?php

$arr = [0, 100, -4, 8, 143, 5, 99, 100];
$length = count($arr);
for ($i = 0; $i < $length-1; $i++) {
	for ($j = $i+1; $j < $length; $j++) {
		if ($arr[$i] < $arr[$j]) {
			$temp = $arr[$i];
			$arr[$i] = $arr[$j];
			$arr[$j] = $temp;
		}
	}
}
$max = $arr[0] + $arr[1];
echo $max;
?>