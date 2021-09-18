<?php

namespace Managers;

use Models\AdminsModel;
use PDO;
use PDOException;

class AdminManager
{

    private $pdo;

    public function __construct()
    {

        if (getenv('JAWSDB_URL') !== false) {

            $dbparts = parse_url(getenv('JAWSDB_URL'));
            $hostname = $dbparts['host'];
            $username = $dbparts['user'];
            $password = $dbparts['pass'];
            $database = ltrim($dbparts['path'],'/');
            try {
                $this->setPdo(new PDO("mysql:host=$hostname;dbname=$database", $username, $password));
            }catch (PDOException $e) {
                echo 'Connected failed :' . $e->getMessage();
            }
        }else {
            $this->setPdo(new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root'));
        }

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

        $req = $this->pdo->prepare("
INSERT INTO Admins
    (firstname, lastname, codeName, password)
    VALUES 
           (:codeName, :firstname, :lastname, :password)");
        $req->bindValue(':codeName', $admin->getCodeName(), PDO::PARAM_STR);
        $req->bindValue(':firstname', $admin->getFirstname(), PDO::PARAM_STR);
        $req->bindValue(':lastname', $admin->getLastname(), PDO::PARAM_STR);
        $req->bindValue(':password', $admin->getPassword());
        var_dump($req);
        if ($req->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function uptdate(AdminsModel $admin)
    {
        $req = $this->pdo->prepare('
UPDATE 
    Admins
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
        $req = $this->pdo->prepare('DELETE FROM Admins WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $req->execute();
    }

    public function getByCodeName(string $codeName): AdminsModel
    {
        $codeName = (string)$codeName;
        $req = $this->pdo->prepare('SELECT * FROM Admins WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $data = $req->fetch();
        return new AdminsModel($data);
    }

    public function getAll(): array
    {

        $req = $this->pdo->query('SELECT * FROM Admins ORDER BY codeName DESC ');
        $admin = array();
        foreach ($req->fetchAll() as $data) {
            $admin[] = new AdminsModel($data);
        }
        return $admin;
    }
}