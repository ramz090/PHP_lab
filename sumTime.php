<?php
$timeStringFirst = $argv[1];
$timeStringSecond = $argv[2];
function sumTime(string $timeStringFirst, $timeStringSecond): string
{
    $hour = 0;
    $minute = 0;
    $second = 0;
    if (!preg_match("/[0-9, \: ]+$/", $timeStringFirst) or strlen($timeStringFirst) !== 8) {
        return "Ошибка в написании первой строки ";
    }

    if (!preg_match("/[0-9, \: ]+$/", $timeStringSecond) or strlen($timeStringSecond) !== 8) {
        return "Ошибка в написании второй строки ";
    }
    $second = substr($timeStringFirst, 6, 8) + substr($timeStringSecond, 6, 8);
    if ($second > 59) {
        $second = $second - 60;
        $minute = $minute + 1;
    }
    $minute = $minute + substr($timeStringFirst, 3, 5) + substr($timeStringSecond, 3, 5);
    if ($minute > 59) {
        $minute = $minute - 60;
        $hour = $hour + 1;
    }
    $hour = $hour + substr($timeStringFirst, 0, 2) + substr($timeStringSecond, 0, 2);
    if ($hour > 23) {
        $hour = $hour - 24;
    }
    return "$hour:$minute:$second";
}
echo sumTime($timeStringFirst, $timeStringSecond);
