<?php

function generator($user)
{
    $count = 0;
    for ($i = 0; $i < strlen($user); $i++)
        if ($user[$i] == "h") {
            $count++;
            yield "4";
        } elseif ($user[$i] == "l") {
            $count++;
            yield "1";
        } elseif ($user[$i] == "e") {
            $count++;
            yield "3";
        } elseif ($user[$i] == "o") {
            $count++;
            yield "0";
        } else {
            yield $user[$i];
        }
    return $count;
}

$array = generator($text);
function toString()
{
    global $array;
    $s = "";
    foreach ($array as $i)
        $s .= $i;
    echo "Ответ: " . $s . "<br/>";
}

echo "Ваше слово:  " . $text . "<br/>";
toString();
echo "Количество замен: " . $array->getReturn();
?>
