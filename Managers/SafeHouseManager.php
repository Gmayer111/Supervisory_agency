<?php

namespace Managers;

use PDO;
use Models\SafeHousesModel;

class SafeHouseManager
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


    public function create(SafeHousesModel $safeHouse) :bool
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


        $code = validDatas($_POST['code']);
        $country = validDatas($_POST['country']);
        $type = validDatas($_POST['type']);
        $address = validDatas($_POST['address']);
        $req = $this->pdo->prepare("
INSERT INTO intelligence_agency.Safe_houses
    (code, address, country, type)
    VALUES 
           ('$code', '$address', '$country', '$type')");
        $req->bindValue($code, $safeHouse->getCode(), PDO::PARAM_STR);
        $req->bindValue($country, $safeHouse->getCountry(), PDO::PARAM_STR);
        $req->bindValue($type, $safeHouse->getType(), PDO::PARAM_STR);
        $req->bindValue($address, $safeHouse->getAddress(), PDO::PARAM_STR);
        $req->execute();
        return true;
    }

    public function uptdate(SafeHousesModel $safeHouse)
    {
        $req = $this->pdo->prepare('
UPDATE 
    intelligence_agency.Safe_houses 
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

    public function delete(string $code)
    {
        $req = $this->pdo->prepare('DELETE FROM intelligence_agency.Safe_houses WHERE code = :code');
        $req->bindValue(':codeName', $code, PDO::PARAM_STR);
        $req->execute();
    }

    public function getByCodeName(string $code): SafeHousesModel
    {
        $code = (string)$code;
        $req = $this->pdo->prepare('SELECT * FROM intelligence_agency.Safe_houses WHERE code = :code');
        $req->bindValue(':code', $code, PDO::PARAM_STR);
        $data = $req->fetch();
        return new SafeHousesModel($data);
    }

    public function getAll(): array
    {

        $req = $this->pdo->query('SELECT * FROM intelligence_agency.Safe_houses ORDER BY code DESC ');
        $safeHouse = array();
        foreach ($req->fetchAll() as $data) {
            $safeHouse[] = new SafeHousesModel($data);
        }
        return $safeHouse;
    }
}