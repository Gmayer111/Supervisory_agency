<?php


namespace Login;


use PDO;

class LoggedOut
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function logout()
    {

        return;
    }

}