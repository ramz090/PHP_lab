<?php

namespace Roma\Lw6;

class UserService
{
    public static function sortByUsernameByAsk(User $a, User $b): int
    {
        return strtolower($a->username) <=> strtolower($b->username);
    }
    public static function sortByUsernameByDesk(User $a, User $b): int
    {
        return strtolower($b->username) <=> strtolower($a->username);
    }

    /**
     * @param array<User>  $usersArray
     * @return array<User>
     */
    public static function sortByUsername(array $usersArray, bool $orderByAsc): array
    {

        if ($orderByAsc) {
            usort($usersArray, [UserService::class, "sortByUsernameByAsk"]);
        } else {
            usort($usersArray, [UserService::class, "sortByUsernameByDesk"]);
        }
        return $usersArray;
    }
    public static function sortByBirthdayByAsk(User $a, User $b): int
    {
        return $a->birthday <=> $b->birthday;
    }
    public static function sortByBirthdayByDesk(User $a, User $b): int
    {
        return $b->birthday <=> $a->birthday;
    }

    /**
     * @param array<User>  $usersArray
     * @return array<User>
     */
    public static function sortByBirthday(array $usersArray, bool $orderByAsc): array
    {

        if ($orderByAsc) {
            usort($usersArray, [UserService::class, "sortByBirthdayByAsk"]);
        } else {
            usort($usersArray, [UserService::class, "sortByBirthdayByDesk"]);
        }
        return $usersArray;
    }
}
