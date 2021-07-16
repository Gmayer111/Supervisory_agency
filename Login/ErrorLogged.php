<?php


namespace Login;

use PDO;
use Vues\Login\LoginVue;

class ErrorLogged
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function error()
    {

        ?><style><?php include_once 'Public/Css/login.css'?></style><?php
        ?><script><?php include_once 'Public/Javascript/login.js'?></script><?php
        $vue = new LoginVue();
        $vue->render();

    }
}