<?php

namespace Managers;

use PDO;
use Models\SafeHousesModel;
use PDOException;

class SafeHouseManager
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
            try {
                $this->setPdo(new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root'));
            }catch (PDOException $e) {
                echo 'Connected failed :' . $e->getMessage();
            }

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


    public function create(SafeHousesModel $safeHouse) :bool
    {

        $missionManager = new MissionManager();
        $codeNameMission = $missionManager->getData()[0];

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


        $code = validDatas($_POST['code']);
        $country = validDatas($_POST['country']);
        $type = validDatas($_POST['type']);
        $address = validDatas($_POST['address']);
        $shMission = $codeNameMission;
        $req = $this->pdo->prepare("
INSERT INTO Safe_houses
    (code, address, country, type, sf_Mission)
    VALUES 
           (:code, :address, :country, :type, :shMission)");
        $req->bindValue(':code', $safeHouse->getCode(), PDO::PARAM_STR);
        $req->bindValue(':country', $safeHouse->getCountry(), PDO::PARAM_STR);
        $req->bindValue(':type', $safeHouse->getType(), PDO::PARAM_STR);
        $req->bindValue(':address', $safeHouse->getAddress(), PDO::PARAM_STR);
        $req->execute();
        return true;
    }

    public function uptdate(SafeHousesModel $safeHouse)
    {
        $req = $this->pdo->prepare('
UPDATE 
    Safe_houses 
SET 
    code = :code, country = :country, type = :type, address = :address
    WHERE code = :code
    ');
        $req->bindValue(':code', $safeHouse->getCode(), PDO::PARAM_STR);
        $req->bindValue(':country', $safeHouse->getCountry(), PDO::PARAM_STR);
        $req->bindValue(':type', $safeHouse->getType(), PDO::PARAM_STR);
        $req->bindValue(':address', $safeHouse->getAddress(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(string $code):bool
    {
        $req = $this->pdo->prepare('DELETE FROM Safe_houses WHERE code = :code');
        $req->bindValue(':code', $code, PDO::PARAM_STR);
        if ($req->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function getByCodeName(string $code): SafeHousesModel
    {
        $code = (string)$code;
        $req = $this->pdo->prepare('SELECT * FROM Safe_houses WHERE code = :code');
        $req->bindValue(':code', $code, PDO::PARAM_STR);
        $data = $req->fetch();
        return new SafeHousesModel($data);
    }

    public function getAll(): array
    {

        $req = $this->pdo->query('SELECT * FROM Safe_houses ORDER BY code DESC ');
        $safeHouse = array();
        foreach ($req->fetchAll() as $data) {
            $safeHouse[] = new SafeHousesModel($data);
        }
        return $safeHouse;
    }
}