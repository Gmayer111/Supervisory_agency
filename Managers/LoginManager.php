<?php

namespace Managers;

use Models\LoginModel;
use PDO;

class LoginManager
{

    public function login(): bool
    {

        session_start();


        function validData($data)
        {
            // Enlève espace inutile
            $data = trim($data);
            // Supprime les antislashs
            $data = stripcslashes($data);
            // Echappe caractères type < >
            $data = htmlspecialchars($data);
            return $data;
        }

        $codeName = validData($_POST['CodeName']);
        $password = validData($_POST['password']);

        $pdo = new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root');
        $stmt = $pdo->prepare('SELECT * FROM intelligence_agency.Admins WHERE codeName = :codeName AND password = :password');
        $stmt->bindValue(':codeName', $codeName);
        $stmt->bindValue(':password', $password);


        $stmt->setFetchMode(PDO::FETCH_CLASS, LoginModel::class);
        if ($stmt->execute()) {
            $users = $stmt->fetchAll();
            foreach ($users as $user) {
                $password = $user->getPassword();
                $codeName = $user->getCodeName();
                if ($password === $_POST['password'] && $codeName === $_POST['CodeName']) {
                    $_SESSION['CodeName'] = 'Gaël';
                    return true;
                }
            }
        }
        return false;
    }



}
