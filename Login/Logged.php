<?php


namespace Login;


use Models\AdminsModel;
use PDO;
use Vues\Profil\ProfilVue;

class Logged
{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function login(): bool
    {
        $stmt = $this->pdo->prepare('SELECT * FROM intelligence_agency.Admins WHERE codeName = :codeName AND password = :password');
        $stmt->bindValue(':codeName', $_POST['CodeName']);
        $stmt->bindValue(':password', $_POST['password']);
        $stmt->setFetchMode(PDO::FETCH_CLASS, AdminsModel::class);
        if ($stmt->execute()) {
            $users = $stmt->fetchAll();
            foreach ($users as $user) {
                $password = $user->getPassword();
                $codeName = $user->getCodeName();
                if ($password === $_POST['password'] && $codeName === $_POST['CodeName']) {
                    ?><style><?php include_once 'Public/Css/profil.css'?></style><?php
                    $vue = new ProfilVue();
                    $vue->render();
                    return true;
                }
            }
        }
    return false;
    }



}