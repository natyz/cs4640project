<?php

function checkRepeatedWords($sentence)
{
   $result = []; 
   
  $words = explode(" ", $sentence);

  foreach ($words as $word) {
     if (array_key_exists($word, $result)) {
        $result[$word] = $result[$word] + 1;
     }
     else {
        $result[$word] = 1;
     }
  }
   
  foreach ($result as $key => $value) {
     if ($value == 1) {
        unset($result[$key]);
     }
  }
     
   
   return $result;
}

// array_keys(somearray) returns an array containing keys of somearray
// in_array(something, somearray) returns true if something exists in somearray


print_r(checkRepeatedWords("I will do more more practice and my bring my my my questions to class"));

?>
