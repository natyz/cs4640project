<?php

function merge_books($book1, $book2)
{
    $merged = Array();
    foreach(array_keys($book1) as $array_key) {
        $merged[$array_key] = array($book1[$array_key]);
      }
    foreach(array_keys($book2) as $array_key){
        if (array_key_exists($array_key, $merged)){
            array_push($merged[$array_key],$book2[$array_key]);
        }
        else{
            $merged[$array_key] = array($book2[$array_key]);
        }
    }
    return to_string($merged);  
}

function to_string($array){
    foreach ($array as $key => $array_value){
        echo "$key: [ ";
        for ($i=0;$i<sizeof($array_value);$i++){
            echo $array_value[$i];
            if($i<count($array_value)-1){
                echo ", ";
            }
            else{
            echo " ] <br/>";
            }
        }
    }
}


// array_keys(somearray) returns an array containing keys of somearray
// in_array(something, somearray) returns true if something exists in somearray


$friend_book1 = Array('Humpty' => '111-111-1111', 'Dumpty' => '222-222-2222', 
                      'Duh' => '333-333-3333', 'Oops' => '444-444-4444', 'Huh' => '555-555-5555');
$friend_book2 = Array('Dumpty' => 'dumpty@uva.edu', 'Duh' => 'duh@uva.edu', 
                      'Humpty' => 'humpty@uva.edu', 'Huh' => 'huh@uva.edu', 
                      'Wacky' => 'wacky@uva.edu');

$result = merge_books($friend_book1, $friend_book2);
print($result); 
?>