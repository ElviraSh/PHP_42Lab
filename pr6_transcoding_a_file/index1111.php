<?php
/**
 * Created by PhpStorm.
 * User: liliya.mannapova
 * Date: 03.12.2017
 * Time: 10:52
 */

if (file_exists('index.ini')) {
    $iniFile = parse_ini_file('index.ini', true);

    $firstSymbol = $iniFile['first_rule']['symbol'];
    $firstRule = $iniFile['first_rule']['upper'];
    $secondSymbol = $iniFile['second_rule']['symbol'];
    $secondRule = $iniFile['second_rule']['direction'];
    $thirdSymbol = $iniFile['third_rule']['symbol'];
    $thirdRule = $iniFile['third_rule']['delete'];

    if (file_exists($iniFile['main']['filename'])) {
        $filename = $iniFile['main']['filename'];
        $file = fopen($filename, 'r');

        while (!feof($file)) {
            $strings = fgets($file);
            $rule = substr($strings, 0, 3);
            if ($rule == $firstSymbol) {
                $strings = trim(substr($strings, 3));
                if ($firstRule == "true")
                    $strings = strtoupper($strings);
                else if ($firstRule == "false")
                    $strings = strtolower($strings);
                else {
                    echo '? ??????? ?1 ?????????? ????????: "true" ? "false"!' . "\n";
                }
                echo $strings . "\n";
            } else if ($rule == $secondSymbol) {
                $strings = trim(substr($strings, 3));
                if ($secondRule == '+') {
                    for ($i = 0; $i < strlen($strings); $i++) {
                        if ($strings[$i] >= "0" && $strings[$i] < "9") {
                            $temp = intval($strings[$i]);
                            $strings[$i] = ++$temp;
                            continue;
                        } else if ($strings[$i] == "9") {
                            $strings[$i] = "0";
                            continue;
                        }
                    }
                } else if ($secondRule == '-') {
                    for ($i = 0; $i < strlen($strings); $i++) {
                        if ($strings[$i] > "0" && $strings[$i] <= "9") {
                            $temp = intval($strings[$i]);
                            $strings[$i] = --$temp;
                            continue;
                        } else if ($strings[$i] == "0") {
                            $strings[$i] = "9";
                            continue;
                        }
                    }
                } else {
                    echo '? ??????? ?2 ?????????? ????????: "+" ? "-"!' . "\n";
                }
                echo $strings . "\n";
            } else if ($rule == $thirdSymbol) {
                $strings = trim(substr($strings, 3));
                $strings = str_replace($thirdRule, '', $strings);
                echo $strings . "\n";
            } else {
                echo $strings . "\n";
            }
        }
    } else {
        echo '???? ' . $iniFile['main']['filename'] . ' ?? ??????.';
    }
} else {
    echo '???? "index.ini" ?? ??????.';
}
