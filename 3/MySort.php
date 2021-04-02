<?php
    $textArray = explode(PHP_EOL, $_POST["text"]);
    $originalText = $textArray;

    function myAdd(&$arr, $add) {
        foreach($add as $value) {
            $arr[] = $value;
        }
    }

    function mySort($arr) {
        $less;
        $equal;
        $more;

        foreach($arr as $value) {
            if(strcmp(strtolower($value),$arr[1]) == 1) {
                $more[] = $value;
            } elseif(strcmp(strtolower($value),$arr[1]) == -1){
                $less[] = $value;
            } else {
                $equal[] = $value;
            }
        }

        $result;
        if (isset($less)) {
            myAdd($result, $less);
        }
        if (isset($equal)) {
            myAdd($result, $equal);
        }
        if (isset($more)) {
            myAdd($result, $more);
        }
        return $result;
    }

    foreach($textArray as $value) {
        echo $value."<br>";
    }

    foreach($textArray as $value) {
        $array = mySort(explode(" ", $value));

        $result = "";
        foreach($array as $value) {
            $result = $result." ".$value;
        }
        echo $result."<br>";
    }