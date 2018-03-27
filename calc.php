<?php
define('numValue', '0123456789');
define('numValueLen', strlen(numValue));

function only_number($n){
    (string) $n = $n;
    $pt = false;

    for($i = 0; $i<strlen($n); $i++){
        $charValid = false;
        for($j = 0; $j<numValueLen; $j++){
            if($n[$i] == numValue[$j])
                $charValid = true;
        }

        if($n[$i] == '.'){
            if($pt)return false;
            $charValid = true;
            $pt = true;
        }
        
        if(!$charValid)return false;
    }
    return true;
}
function mult($x, $y){
    return $x*$y;
}
function div($x, $y){
    return $x/$y;
}
function ad($x ,$y){
    return $x+$y;
}
function sub($x, $y){
    return $x-$y;
}
?>