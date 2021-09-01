<?php

namespace Managers;

use Models\AdminsModel;
use PDO;

class AdminManager
{

    private $pdo;

    public function __construct()
    {
        $this->setPdo(new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root'));
    }

    /**
     * @return mixed
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param mixed $pdo
     */
    public function setPdo($pdo): void
    {
        $this->pdo = $pdo;
    }


    public function create(AdminsModel $admin) :bool
    {


        function validDatas($data)
        {
            // Enlève espace inutile
            $data = trim($data);
            // Supprime les antislashs
            $data = stripcslashes($data);
            // Echappe caractères type < >
            $data = htmlspecialchars($data);
            return $data;
        }

        $codeName = validDatas($_POST['codeName']);
        $firstname = validDatas($_POST['firstName']);
        $lastname = validDatas($_POST['lastName']);
        $password = password_hash(validDatas($_POST['password']), PASSWORD_BCRYPT);
        $req = $this->pdo->prepare("
INSERT INTO intelligence_agency.Admins
    (firstname, lastname, codeName, password)
    VALUES 
           ('$codeName', '$firstname', '$lastname', '$password')");
        $req->bindValue($codeName, $admin->getCodeName(), PDO::PARAM_STR);
        $req->bindValue($firstname, $admin->getFirstname(), PDO::PARAM_STR);
        $req->bindValue($lastname, $admin->getLastname(), PDO::PARAM_STR);
        $req->bindValue($password, $admin->getPassword());
        var_dump($req);
        if ($req->execute()) {
            echo 'exec ok';
            return true;

        }
        return false;
    }

    public function uptdate(AdminsModel $admin)
    {
        $req = $this->pdo->prepare('
UPDATE 
    intelligence_agency.Admins
SET
    codeName = :codeName, firstname = :firstName, lastname = :lastName, password = :password
WHERE codeName = :codeName
    ');
        $req->bindValue(':codeName', $admin->getCodeName(), PDO::PARAM_STR);
        $req->bindValue(':firstName', $admin->getFirstname(), PDO::PARAM_STR);
        $req->bindValue(':lastName', $admin->getLastname(), PDO::PARAM_STR);
        $req->bindValue(':password', $admin->getPassword(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(string $codeName)
    {
        $req = $this->pdo->prepare('DELETE FROM intelligence_agency.Admins WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $req->execute();
    }

    public function getByCodeName(string $codeName): AdminsModel
    {
        $codeName = (string)$codeName;
        $req = $this->pdo->prepare('SELECT * FROM intelligence_agency.Admins WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $data = $req->fetch();
        return new AdminsModel($data);
    }

    public function getAll(): array
    {

        $req = $this->pdo->query('SELECT * FROM intelligence_agency.Admins ORDER BY codeName DESC ');
        $admin = array();
        foreach ($req->fetchAll() as $data) {
            $admin[] = new AdminsModel($data);
        }
        return $admin;
    }
}