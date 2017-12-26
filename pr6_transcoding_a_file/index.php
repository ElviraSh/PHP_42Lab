<?php
if (file_exists('index.ini')) {

    $indexINI = parse_ini_file('index.ini', true);

    $fp = file("index.ini");



    if (count(file("index.ini")) == 0 or count(file($indexINI['main']['filename'])) == 0) {

        if (count(file("index.ini")) == 0)
        print ("index.ini пуст");

        else print ($indexINI['main']['filename'] . " файл пуст");


    } else {

        $first_symbol = $indexINI['first_rule']['symbol'];
        $second_symbol = $indexINI['second_rule']['symbol'];
        $third_symbol = $indexINI['third_rule']['symbol'];
        $first_rule = $indexINI['first_rule']['upper'];
        $second_rule = $indexINI['second_rule']['direction'];
        $third_rule = $indexINI['third_rule']['delete'];

        if (file_exists($indexINI['main']['filename'])) {
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
                    /*print ($string . "<br>");*/
                    print ($string . "\n");


                }
                if ($rule != $first_symbol)

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
                        }
                        if ($second_rule != '+') {
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
                        /*print ($string . "<br>");*/
                        print ($string . "\n");
                    }
                if ($rule != $second_symbol)

                    if ($rule == $third_symbol) {
                        $string = str_replace($third_rule, '', $string);
                        print ($string . "\n");


                    }

            }

        } else {
            echo $indexINI['main']['filename'] . ' fail not exists';

        }
    }
}

else {
        echo  "index.ini not exists";


    }