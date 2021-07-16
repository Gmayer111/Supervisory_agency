<?php

namespace Controllers;

use Login\ErrorLogged;
use Login\Logged;
use Login\LoggedOut;
use PDO;

class AdminsController
{
    public function profil()
    {

        $pdo = new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root');
        $logged = new Logged($pdo);
        $logout = new LoginController();


        if ($logged->login() === true) {
            return true;
        } elseif ($logged->login() === false) {
            $logout->login();
            return false;
        }else {
            $logout->logout();
        }

    }

}