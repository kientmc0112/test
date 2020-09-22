<?php

$arr = [0, 100, -4, 8, 143, 5, 99, 100];

$length = count($arr);
function swap(&$a, &$b) {
	$temp = $a;
	$a = $b;
	$b = $temp;
}
/**
 * Tìm vị trí trung gian để chia mảng thành 2 phần
 */
function splitPosition(&$arr, $l, $r) {
	$pivot = $arr[$r]; // Đặt giá trị trung gian
	$r1 = $r-1;
	while (true) {
		while ($l <= $r1 && $arr[$l] < $pivot) $l++; // Tăng lên cho đến khi có phần tử ở đầu lớn hơn giá trị trung gian
		while ($l <= $r1 && $arr[$r1] > $pivot) $r1--; // Giảm xuống cho đến khi có phần tử ở cuối nhỏ hơn giá trị trung gian
		if ($l >= $r1) break; // Thoát khỏi vòng lặp while, có thể sử dụng flag.
		swap($arr[$l], $arr[$r1]); // Đổi chỗ 2 phần tử 
		$l++;
		$r1--;
	}
	swap($arr[$l], $arr[$r]); // Đổi chỗ phần tử trung gian với phần tử đầu của mảng sau

	return $l; // Trả về vị trí trung gian
}

function quickSort(&$arr, $l, $r) {
	if ($l < $r) {
		$pivot = splitPosition($arr, $l, $r); // Vị trí trung gian
		/**
		 * Ví phần tử vị trí trung gian sẽ chia mảng thành 2 phần: 1 phần nhỏ hơn, 1 phần lớn hơn nên ta thực hiện tiếp bỏ qua phần tử trung gian. [$l, $pivot-1] - [$pivot+1, $r]
		 */
		quickSort($arr, $l, $pivot-1);
		quickSort($arr, $pivot+1, $r);
	}
}

quickSort($arr, 0, $length-1);
print_r($arr);
?>