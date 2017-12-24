<?php
require_once "Month.php";
include "form.html";


if ($_SERVER['REQUEST_METHOD'] =='POST') {
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];

    if ($day != null && $year != null) {

        date_default_timezone_set("Europe/Moscow");
        $date = new DateTime($year . '-' . $month . '-' . $day);
        $date_m = new Month($month, $year);

        print (( $date->format("d.m.Y") . " - " . getNameOfWeek($date_m->getNumberOfWeek($date) ) )."</b>" );
        print "<br><br><br>";
        print(printMonth($date_m, $month, $year));

    }
    else if ($day == null) print ("Введите день!");
    else if ($year == null) print ("Введите год!");

}

function printMonth(Month $month_numberoffWeek, $month, $year) {


    $numberOfWeek = $month_numberoffWeek->getNumberOfWeek(new DateTime("01-" . $month . "-" . $year));
    $space = "<table style='margin-left: 40%' ><tr><td>пн</td><td>вт</td><td>ср</td><td>чт</td><td>пт</td><td style='color: red'>сб</td><td style='color: red'>вс</td></tr><tr>" . getSpace($numberOfWeek) ;

    foreach ($month_numberoffWeek as $item) {
        if ($item->format("d") == "01") {
            $space .= "</tr><tr>" . getSpace($numberOfWeek);
        }
        if ($numberOfWeek == 7) {
            $space .= "<td>" . $item->format("d") . "</td></tr><tr>";
            $numberOfWeek = 1;
        } else {
            $space .= "<td>" . $item->format("d") . "&nbsp" . "</td>";
            $numberOfWeek++;
        }
    }
    return $space . "</tr></table>" . getSpace($numberOfWeek);
}

function getSpace($time) {
    $s = "";
    if ($time > 1) {
        for ($i = 1; $i < $time; $i++) {
            $s .= "<td></td>";
        }
    }
    return $s;
}

function getNameOfWeek($week) {

        if ($week == 1) return "понедельник";
        if ($week == 2) return "вторник";
        if ($week == 3) return "среда";
        if ($week == 4) return "четверг";
        if ($week == 5) return "пятница";
        if ($week == 6) return "суббота";
        if ($week == 7) return "воскресенье";

}

