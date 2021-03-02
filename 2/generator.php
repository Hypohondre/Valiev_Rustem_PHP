<?php

function generator($str, &$count) {
    for ($i=0; $i < count($str); $i++) {
        switch ($str[$i]) {
            case "h":
                yield 4;
                $count++;
                break;
            case "l":
                yield 1;
                $count++;
                break;
            case "e":
                yield 3;
                $count++;
                break;
            case "o":
                yield 0;
                $count++;
                break;
            
            default:
                yield $str[$i];
                break;
        }
    }
}

function modifyString($str): array{
    if ($str == null) {
        throw new LogicException("пустая строка не может быть модифицирована");
    }


    $text = str_split($str);
    $result = "";
    $modify = 0;

    foreach(generator($text, $modify) as $char) {
        $result = $result.$char;
    }
    $arrayResult = [$result, $modify];

    return $arrayResult;
}

$array = modifyString($_POST["text"]);

echo $array[0];
echo "<br>";
echo $array[1];