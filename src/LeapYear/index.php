<?php
require_once "Model/Year.php";

function isLeapString($year){
    print_r("Year: $year -> ");
    $year = new \App\LeapYear\Model\Year($year);
    print_r((($year->isLeap()) ? "LEAP" : "NO LEAP") . "\n");
}

isLeapString(1500);
isLeapString(1600);
isLeapString(1700);
isLeapString(1800);
isLeapString(1900);
isLeapString(2000);
isLeapString(2022);
isLeapString(2024);
isLeapString(2028);


