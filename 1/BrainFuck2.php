<?php
$code = str_split($_POST["code"]);
$codeIndex = 0;

$param = str_split($_POST["param"]);
$paramIndex = 0;

$result = array(0);
$index = 0;


while(count($code) > $codeIndex+1 ) {
    $nextCode = $code[$codeIndex];
    
    switch($nextCode) {
        case "+":
            $result[$index]++;
            break;
        case "-":
            $result[$index]--;
            break;
        case ">":
            $index++;
            if(!isset($result[$index])) {
                $result[$index] = 0;
            }
            break;
        case "<":
            $index--;
            break;
        case ".":
            echo chr($result[$index]);
            break;
        case ",":
            $symbol = ord($param[$paramIndex]);
            $paramIndex++;
            if ($symbol <=255 && $symbol >= 0) {
                $result[$index] = $symbol;
            }
            break;
        case "[":
            if(!$result[$index]) {
                $cycle = 1;
                while($cycle) {
                    $codeIndex++;
                    if($code[$codeIndex] == "[") {
                        $cycle++;
                    } else if($code[$codeIndex] == "]"){
                        $cycle--;
                    }
                }
            }
            break;
        case "]":
            if($result[$index]) {
                $cycle = 1;
                while($cycle) {
                    $codeIndex--;
                    if($code[$codeIndex] == "]") {
                        $cycle++;
                    } else if($code[$codeIndex] == "[") {
                        $cycle--;
                    }
                }
            }
            break;
    }
    $codeIndex++;
}