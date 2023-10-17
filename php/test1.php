<?php

$string = "TRUE FRIENDS ARE ME AND YOU";

function shortestWord($string){

    $words = explode(' ',$string);
    $short = '';
    foreach($words as $val){
        if($short){
            if(strlen($val) < strlen($short)){
                $short = $val;
            }
        }else{
            $short = $val; 
        }
    }

    return $short;

}
echo $string;
echo '<br>';
echo (shortestWord($string));
echo '<br>';
echo (shortestWord('I AM THE LEGENDARY VILLAIN'));

?>
