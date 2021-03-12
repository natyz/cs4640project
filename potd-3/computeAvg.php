<?php

function computeAvg($s1, $s2, $s3, $s4, $s5, $s6, $drop) {
    $sum = 0;

    $s1 = ($s1 / 30)*100;
    $s5 = ($s5 / 50)*100;

    $data = [$s1, $s2, $s3, $s4, $s5, $s6];
    $total = array_sum($data);
    $min = min($data);

    return $drop ? ($total - $min) / 5 : $total / 6;
}



echo "computeAvg(15, 55, 55, 55, 25, 55, true) : you got " . computeAvg(15, 55, 55, 55, 25, 55, true) . " : expected 54 <br/>";      
echo "computeAvg(15, 55, 55, 55, 25, 55, false) : you got " . computeAvg(15, 55, 55, 55, 25, 55, false) . " : expected 53.33 <br/>";  
echo "computeAvg(15, 55, 55, 55, 27.5, 50, true) : you got " . computeAvg(15, 55, 55, 55, 27.5, 50, true) . " : expected 54 <br/>";    
echo "computeAvg(15, 55, 55, 55, 27.5, 50, false) : you got " . computeAvg(15, 55, 55, 55, 27.5, 50, false) . " : expected 53.33 <br/>"; 


?> 