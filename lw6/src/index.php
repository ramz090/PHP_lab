<?php
require_once "User.php";
require_once "UserService.php";
$firstUser  = new User("First", "123", new DateTime("2020-12-2"));
$secondUser  = new User("second", "123", new DateTime("2019-12-2"));
$thridUser  = new User("thrid", "123", new DateTime("2018-12-2"));
$usersArray[] =  $secondUser;
$usersArray[] =  $thridUser;
$usersArray[] =  $firstUser;
foreach ($usersArray as $value) {
    echo ($value->username . " ");
}
echo PHP_EOL;
$usersArray = UserService::sortByUsername($usersArray, true);
foreach ($usersArray as $value) {
    echo ($value->username . " ");
}
echo PHP_EOL;
$usersArray = UserService::sortByUsername($usersArray, false);
foreach ($usersArray as $value) {
    echo ($value->username . " ");
}
echo PHP_EOL;
echo PHP_EOL;
$usersArray = UserService::sortByBirthday($usersArray, false);
foreach ($usersArray as $value) {
    echo ($value->username . " ");
}
echo PHP_EOL;
$usersArray = UserService::sortByBirthday($usersArray, true);

foreach ($usersArray as $value) {
    echo ($value->username . " ");
}
