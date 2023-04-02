<?php

namespace Roma\Lw6;

class User
{
    public string $username;
    public string $password;
    public \DateTime $birthday;
    public function __construct(string $username, string $password, \DateTime $birthday)
    {
        $this->username = $username;
        $this->password = $password;
        $this->birthday = $birthday;
    }
}
