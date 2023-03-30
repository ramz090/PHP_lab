<?php 
class User{
    public string $username;
    public string $password; 
    public DateTime $birthday;
    public function __construct(string $enteredUsername,string $enteredPassword, DateTime $enteredBirthday)
    {
        $this->username = $enteredUsername;
        $this->password = $enteredPassword; 
        $this->birthday = $enteredBirthday;
    }
}