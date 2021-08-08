<?php

namespace Managers;

use PDO;
use Models\TargetsModel;

class TargetManager
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


    public function create(TargetsModel $target) :bool
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
        $nationality = validDatas($_POST['nationality']);
        $dateOfBirth = validDatas($_POST['dateOfBirth']);
        $localisation = validDatas($_POST['localisation']);
        $req = $this->pdo->prepare("
INSERT INTO intelligence_agency.Targets 
     (codeName, firstname, lastname, nationality, dateOfBirth, localisation)
    VALUES 
           ('$codeName', '$firstname', '$lastname', '$nationality', '$dateOfBirth', '$localisation')");
        $req->bindValue($codeName, $target->getCodeName(), PDO::PARAM_STR);
        $req->bindValue($firstname, $target->getFirstname(), PDO::PARAM_STR);
        $req->bindValue($lastname, $target->getLastname(), PDO::PARAM_STR);
        $req->bindValue($nationality, $target->getNationality(), PDO::PARAM_STR);
        $req->bindValue($dateOfBirth, $target->getDateOfBirth(), PDO::PARAM_STR);
        $req->bindValue($localisation, $target->getLocalisation(), PDO::PARAM_STR);
        $req->execute();

        return true;

    }

    public function uptdate(TargetsModel $target)
    {
        $req = $this->pdo->prepare('
UPDATE 
    intelligence_agency.Targets 
SET 
    codeName = :codeName, firstname = :firstName, lastname = :lastName, nationality = :nationality, dateOfBirth = :dateOfBirth, localisation = :localisation
WHERE codeName = :codeName
    ');
        $req->bindValue('codeName', $target->getCodeName(), PDO::PARAM_STR);
        $req->bindValue('firstname', $target->getFirstname(), PDO::PARAM_STR);
        $req->bindValue('lastname', $target->getLastname(), PDO::PARAM_STR);
        $req->bindValue('nationality', $target->getNationality(), PDO::PARAM_STR);
        $req->bindValue('dateOfBirth', $target->getDateOfBirth(), PDO::PARAM_STR);
        $req->bindValue('localisation', $target->getLocalisation(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(string $codeName)
    {
        $req = $this->pdo->prepare('DELETE FROM intelligence_agency.Targets WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $req->execute();
    }

    public function getByCodeName(string $codeName): TargetsModel
    {
        $codeName = (string)$codeName;
        $req = $this->pdo->prepare('SELECT * FROM intelligence_agency.Targets WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $data = $req->fetch();
        return new TargetsModel($data);
    }

    public function getAll(): array
    {

        $req = $this->pdo->query('SELECT * FROM intelligence_agency.Targets ORDER BY codeName DESC ');
        $target = array();
        foreach ($req->fetchAll() as $data) {
            $target[] = new TargetsModel($data);
        }
        return $target;
    }
}