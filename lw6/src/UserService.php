<?php
require_once "User.php";
class UserService
{
    static function sortByUsernameByAsk(User $a, User $b): int
    {
        return strtolower($a->username) <=> strtolower($b->username);
    }
    static function sortByUsernameByDesk(User $a, User $b): int
    {
        return strtolower($b->username) <=> strtolower($a->username);
    }


    static function sortByUsername(array $usersArray, bool $orderByAsc): array
    {

        if ($orderByAsc) {
            usort($usersArray, [UserService::class, "sortByUsernameByAsk"]);
        } else {
            usort($usersArray, [UserService::class, "sortByUsernameByDesk"]);
        }
        return $usersArray;
    }
    static function sortByBirthdayByAsk(User $a, User $b): int
    {
        return $a->birthday <=> $b->birthday;
    }
    static function sortByBirthdayByDesk(User $a, User $b): int
    {
        return $b->birthday <=> $a->birthday;
    }

    static function sortByBirthday($usersArray, bool $orderByAsc): array
    {

        if ($orderByAsc) {
            usort($usersArray, [UserService::class, "sortByBirthdayByAsk"]);
        } else {
            usort($usersArray, [UserService::class, "sortByBirthdayByDesk"]);
        }
        return $usersArray;
    }
}
