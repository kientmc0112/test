<?php

$arr = [0, 100, -4, 8, 143, 5, 99, 100];

$length = count($arr);
function swap(&$a, &$b) {
	$temp = $a;
	$a = $b;
	$b = $temp;
}

function splitPosition(&$arr, $l, $r) {
	$pivot = $arr[$r];
	$r1 = $r-1;
	while (true) {
		while ($l <= $r1 && $arr[$l] < $pivot) $l++;
		while ($l <= $r1 && $arr[$r1] > $pivot) $r1--;
		if ($l >= $r1) break;
		swap($arr[$l], $arr[$r1]);
		$l++;
		$r1--;
	}
	swap($arr[$l], $arr[$r]);

	return $l;
}

function quickSort(&$arr, $l, $r) {
	if ($l < $r) {
		$pivot = splitPosition($arr, $l, $r);
		quickSort($arr, $l, $pivot-1);
		quickSort($arr, $pivot+1, $r);
	}
}

quickSort($arr, 0, $length-1);
print_r($arr);
?>