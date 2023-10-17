<?php

$map = [
        [1,1,1,1],
        [0,1,1,0],
        [0,1,0,1],
        [1,1,0,0],
        ];

function countIsland($map){

    foreach ($map as $key => $val){
        echo '"';
        foreach($val as $key2 => $x){
            echo $x == 1 ? 'X':'~'; 
        }
        echo '"';
        echo '<br>';
    }


}

    


echo '<pre>';
echo countIsland($map);
echo '</pre>';
?>