<?php

$indexINI = parse_ini_file('index.ini', true);

$first_symbol = $indexINI['first_rule']['symbol'];
$second_symbol = $indexINI['second_rule']['symbol'];
$third_symbol = $indexINI['third_rule']['symbol'];
$first_rule = $indexINI['first_rule']['upper'];
$second_rule = $indexINI['second_rule']['direction'];
$third_rule = $indexINI['third_rule']['delete'];

$indexFile = fopen($indexINI['main']['filename'], 'r');

while (!feof($indexFile)) {
    $string = fgets($indexFile);
    $rule = substr($string, 0, 3);
    $string = trim(substr($string, 3));


    if ($rule == $first_symbol) {

        if ($first_rule == "true") {
            $string = strtoupper($string);
        }

        if ($first_rule == "false") {
            $string = strtolower($string);
        }
        print ($string . "<br>");


    } if ($rule != $first_symbol)

        if ($rule == $second_symbol) {
            if ($second_rule == '+') {
                for ($i = 0; $i < strlen($string); $i++) {

                    if ($string[$i] >= "0" && $string[$i] != "9") {
                        $temp = intval($string[$i]);
                        $string[$i] = $temp + 1;
                        continue;

                    }
                        if ($string[$i] == "9") {
                        $string[$i] = "0";
                        continue;
                    }
                }
            } if ($second_rule != '+') {
                for ($i = 0; $i < strlen($string); $i++) {
                    if ($string[$i] > "0" && $string[$i] <= "9") {
                        $temp = intval($string[$i]);
                        $string[$i] = --$temp;
                        continue;
                    }
                    if ($string[$i] == "0") {
                        $string[$i] = "9";
                        continue;
                    }
                }
            }
            print ($string . "<br>");
        } if ($rule != $second_symbol)

            if ($rule == $third_symbol) {
            $string = str_replace($third_rule, '', $string);
            print ($string . "<br>");


        }


    }