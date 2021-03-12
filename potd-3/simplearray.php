<?php
function findLargest($array)
{
	$max = max($array);

    for ($i = sizeof($array) - 1; $i > 0; $i--) {
        if ($array[$i] == $max) {
            return $i;
        }
    }
	
	return -1;
}

$test1 = [1, 20, 3, 4, 5, 6, 7, 8, 9];
$test2 = [1, 2, 4, 50, 50, 8, 30];
$test3 = [0, 0, 0, 0, 0, 0];
$test4 = [1, 2, 4, 50, 50, 8, 50];

echo "findLargest([1, 20, 3, 4, 5, 6, 7, 8, 9]): " . findLargest($test1) . "<br/>";    // expected 1 
echo "findLargest([1, 2, 4, 50, 50, 8, 30]): " . findLargest($test2) . "<br/>";        // expected 4 
echo "findLargest([0, 0, 0, 0, 0, 0]): " . findLargest($test3) . "<br/>";              // expected 5
echo "findLargest([1, 2, 4, 50, 50, 8, 50]): " . findLargest($test4) . "<br/>";        // expected 6
?>



<?php 
function divideByThree($array)
{	
	$count = 0;

	foreach ($array as $val) {
        if ($val % 3 == 0 and $val / 3 != 0) {
            $count++;
        }
    }
	
	return $count;
	
}

$test1 = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$test2 = [1, 2, 4, 5, 7, 8, 30];
$test3 = [0, 0, 0, 0, 0, 0];
$test4 = [1, 2, 4, 50, 50, 8, 50];

echo "divideByThree([1, 2, 3, 4, 5, 6, 7, 8, 9]): " . divideByThree($test1) . "<br/>";    // expected 3
echo "divideByThree([1, 2, 4, 5, 7, 8, 30]): " . divideByThree($test2) . "<br/>";         // expected 1
echo "divideByThree([0, 0, 0, 0, 0, 0]): " . divideByThree($test3) . "<br/>";             // expected 0
echo "divideByThree([1, 2, 4, 50, 50, 8, 50]): " . divideByThree($test3) . "<br/>";       // expected 0
?>