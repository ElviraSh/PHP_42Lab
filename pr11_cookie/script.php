<?php

$text = $_POST["textView"] ?? "";
$cookie = $_COOKIE["cookie"] ?? "";

if ($text != "") {
    setcookie('cookie', $text, time() + 3600);
    $cookie = $text;
}
else print ("Type the word" . "<br>"."<br>");

include "form.html";
include "generator.php";

?>
