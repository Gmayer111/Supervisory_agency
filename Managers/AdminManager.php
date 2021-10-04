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

    public function ajaxConnect()
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
        $firstName = validDatas($_POST['firstName']);
        $lastName = validDatas($_POST['lastName']);
        $password = password_hash(validDatas($_POST['password']), PASSWORD_BCRYPT);
        $email = validDatas($_POST['email']);
        $creationDate = date('Y/m/d h:i:s');


        $req = $this->pdo->prepare("
INSERT INTO Admins
    (codeName, firstname, lastname, password, email, creationDate)
    VALUES 
           (:codeName, :firstname, :lastname, :password, :email, :creationDate)");
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $req->bindValue(':firstname',$firstName, PDO::PARAM_STR);
        $req->bindValue(':lastname', $lastName, PDO::PARAM_STR);
        $req->bindValue(':password', $password);
        $req->bindValue(':email', $email);
        $req->bindValue(':creationDate', $creationDate);
        if ($req->execute()) {
            echo '1';
        }else {
            echo '0';
        }
    }


    public function ajaxUptdate()
    {
        session_start();

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

            $codename = $_SESSION['User']->getCodeName();

            if (isset($_POST['firstName'])) {
                $firstName = validDatas($_POST['firstName']);
                $req = $this->pdo->prepare('UPDATE Admins SET firstName = :firstName WHERE codeName = :codeName ');
                $req->bindValue(':firstName', $firstName, PDO::PARAM_STR);
                $req->bindValue(':codeName', $codename, PDO::PARAM_STR);
                if ($req->execute()) {echo '1'; }else {echo '0';}
            }elseif (isset($_POST['lastName'])) {
                $lastName = validDatas($_POST['lastName']);
                $req = $this->pdo->prepare('UPDATE Admins SET lastName = :lastName WHERE codeName = :codeName ');
                $req->bindValue(':lastName', $lastName, PDO::PARAM_STR);
                $req->bindValue(':codeName', $codename, PDO::PARAM_STR);
                if ($req->execute()) {echo '1'; }else {echo '0';}
            }elseif (isset($_POST['email'])) {
                $email = validDatas($_POST['email']);
                $req = $this->pdo->prepare('UPDATE Admins SET email = :email WHERE codeName = :codeName ');
                $req->bindValue(':email', $email, PDO::PARAM_STR);
                $req->bindValue(':codeName', $codename, PDO::PARAM_STR);
                if ($req->execute()) {echo '1'; }else {echo '0';}
            }

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