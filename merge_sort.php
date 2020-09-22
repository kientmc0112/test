<?php

$arr = [0, 100, -4, 8, 143, 5, 99, 100];

function merge(&$arr, $l, $m, $r) {
	$n1 = $m - $l + 1; // Số phần tử mảng bên trái
	$n2 = $r - $m; // Số phần tử mảng bên phải
	/**
	 * Tạo 2 mảng tạm để lưu các phẩn tử của 2 nửa bên trái và bên phải
	 */
	for ($i = 0; $i < $n1; $i++) {
		$arr1[$i] = $arr[$i + $l];
	}
	for ($j = 0; $j < $n2; $j++) {
		$arr2[$j] = $arr[$j + $m + 1];
	}
	$k = $l; $i = 0; $j = 0; // $k là vị trí đầu của mảng cần merge
	/**
	 * Merge phần tử của 2 mảng
	 */
	while ($i < $n1 && $j < $n2) {
		// Nếu bên trái lớn hơn thì lưu bên trái và ngược lại
		if ($arr1[$i] <= $arr2[$j]) {
			$arr[$k] = $arr1[$i];
			$i++;
		} else {
			$arr[$k] = $arr2[$j];
			$j++;
		}
		$k++;
	}
	while ($i < $n1) { // Khi chạy hết phần tửu của mảng bên phải
		$arr[$k] = $arr1[$i];
		$k++;
		$i++;
	}
	while ($j < $n2) { // Khi chạy hết phần tửu của mảng bên trái
		$arr[$k] = $arr2[$j];
		$k++;
		$j++;
	}

	return $arr;
}

function mergeSort(&$arr, $l, $r) {
	if ($l < $r) {
		$m = $l + (int)(($r - $l)/2); // Tìm vị trí ở giữa, ép kiểu cho php
		mergeSort($arr, $l, $m);
		mergeSort($arr, $m+1, $r);
		merge($arr, $l, $m, $r);
	}
}

mergeSort($arr, 0, count($arr)-1);
print_r($arr);

?>