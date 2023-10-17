<?php
$given = ["I","TWO","FORTY","THREE","JEN","TWO","tWo","Two"];
$target = 'TWO';

function wordSearch($given,$target){

    $index = [];

    foreach($given as $key => $val){

        if(!strcmp($val,$target)){

            $index[] = $key;

        }

    }

    return $index;

}

echo '<pre>';
print_r(wordSearch($given,$target));
echo '</pre>';

?>