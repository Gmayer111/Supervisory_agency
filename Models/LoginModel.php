<?php

namespace Models;

use PDO;

class LoginModel
{

    public function login(): bool
    {
        $pdo = new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root');
        $stmt = $pdo->prepare('SELECT * FROM intelligence_agency.Admins WHERE codeName = :codeName AND password = :password');
        $stmt->bindValue(':codeName', $_POST['CodeName']);
        $stmt->bindValue(':password', $_POST['password']);
        $stmt->setFetchMode(PDO::FETCH_CLASS, AdminsModel::class);
        if ($stmt->execute()) {
            $users = $stmt->fetchAll();
            foreach ($users as $user) {
                $password = $user->getPassword();
                $codeName = $user->getCodeName();
                if ($password === $_POST['password'] && $codeName === $_POST['CodeName']) {
                    return true;
                }
            }
        }
        return false;
    }



}