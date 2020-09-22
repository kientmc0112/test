<?php

$arr = [0, 100, -4, 8, 143, 5, 99, 100];

function maxNumber($arr) {
	$max = $arr[0];
	for ($i = 1; $i < count($arr); $i++) {
		if ($arr[$i] > $max) $max = $arr[$i];
	}

	return $max;
}

function radixSort(&$arr) {
	$digitNumber = 1;
	$n = count($arr);
	$max = max($arr);
	while ($max/$digitNumber > 0) {
		$count = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
		for ($i = 0; $i < $n; $i++) {
			(int)$count[$arr[$i]/$digitNumber%10]++;
		}
		for ($i = 1; $i < 10; $i++) {
			$count[$i] += $count[$i-1];
		}
		for ($i = $n-1; $i >= 0; $i--) {
			$result[$count[$arr[$i]/$digitNumber%10]-1] = $arr[$i];
			$count[$arr[$i]/$digitNumber%10]--;
		}
		for ($i = 0; $i < $n; $i++) {
			$arr[$i] = $result[$i];
		}
		$digitNumber *= 10;
	}
}

radixSort($arr);
print_r($arr);
?>