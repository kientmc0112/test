<?php
$arr = [11, 2, 8, 10, 5, 99, 1, 8, 9];

$flag = true;
function swap(&$a, &$b) {
	$temp = $a;
	$a = $b;
	$b = $temp;
}
$length = count($arr);
while ($flag) {
	$flag = false;
	for ($i = 0; $i < $length-1; $i++) {
		if ($arr[$i] > $arr[$i+1]) {
			swap($arr[$i], $arr[$i+1]);
			$flag = true;
		}
	}
}

print_r($arr);

?>