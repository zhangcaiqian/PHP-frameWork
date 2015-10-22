<?php
	$array=array(1, 4, 5, 6, 7, 9, 12); 
    function search($array, $key) 
    {
        binary_search($array,$key,0,count($array)-1);
    }

    function binary_search($array, $key, $left_index, $right_index) 
    {
        if ($left_index>$right_index) 								// 递归的结束条件
        {
            echo "未找到!";
            return;
        }
        $middle_index = round(($left_index + $right_index) / 2); // 位置折半
        if ($key > $array[$middle_index])							// 比较查找值与数组中间值
        { 
            binary_search($array, $key, $middle_index + 1, $right_index);// 在右半边继续查找
        } 
        else if ($key < $array[$middle_index]) 
        { 
            binary_search($array, $key, $left_index, $middle_index - 1);// 在左半边继续查找
        }
        else 
        { 
            echo "$middle_index";// 找到指定的元素位置
        }
    }
 ?>