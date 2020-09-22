<?php

$arr = [0, 100, -4, 8, 143, 5, 99, 100];

/**
 * Tìm số lớn nhất để xác định cơ số lớn nhất
 */
function maxNumber($arr) {
	$max = $arr[0];
	for ($i = 1; $i < count($arr); $i++) {
		if ($arr[$i] > $max) $max = $arr[$i];
	}

	return $max;
}

function radixSort(&$arr) {
	$digitNumber = 1; // Bắt đầu từ hàng đơn vị
	$n = count($arr); // Số phàn tử của mảng
	$max = max($arr); // Số lớn nhất
	while ($max/$digitNumber > 0) { // Điều kiện dừng
		$count = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // Mảng 10 phần tử từ 0 - 9 tương ứng với hệ thập phân
		for ($i = 0; $i < $n; $i++) {
			(int)$count[$arr[$i]/$digitNumber%10]++; // Đếm số lần xuất hiện
		}
		for ($i = 1; $i < 10; $i++) {
			$count[$i] += $count[$i-1]; // Xác định thứ tự sắp xếp tương ứng từ 1 - 9
		}
		/** 
		 * Chạy vòng lặp từ cuối lên đầu để 2 số cùng nhóm sẽ được sắp xếp theo đúng thứ tự dựa vào các cơ số trước
		 */
		for ($i = $n-1; $i >= 0; $i--) { 
			/**
			 * Vị trí thật sự của các phần tử trong mảng sau khi sắp xếp. Mảng chạy từ 0 nên cần trừ đi 1.
			 */
			$result[$count[$arr[$i]/$digitNumber%10]-1] = $arr[$i]; 
			$count[$arr[$i]/$digitNumber%10]--; // Giảm đi 1 để các số bé hơn sẽ xếp trước
		}
		/**
		 * Lưu kết quả vào mảng
		 */
		for ($i = 0; $i < $n; $i++) {
			$arr[$i] = $result[$i];
		}
		$digitNumber *= 10; // Tăng cơ số lên
	}
}

radixSort($arr);
print_r($arr);
?>