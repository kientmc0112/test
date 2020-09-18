<?php
$arr = [11, 2, 8, 10, 5, 99, 1, 8, 9];
function getHead($value) {
	while ($value >= 10) {
		$value /= 10;
	}

	return (int) $value;
}
$length = count($arr);
for ($i=0; $i < $length-1; $i++) {
	for ($j = $i+1; $j < $length; $j++) {
		if (getHead($arr[$i]) > getHead($arr[$j])) {
			$temp = $arr[$i];
			$arr[$i] = $arr[$j];
			$arr[$j] = $temp;
		}
	}
}

print_r($arr);

?>