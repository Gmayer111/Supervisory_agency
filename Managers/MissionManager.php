<?php

namespace Managers;

use Models\MissionsModel;
use PDO;

class MissionManager
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


    public function create(MissionsModel $mission) :bool
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
        $title = validDatas($_POST['title']);
        $description = validDatas($_POST['description']);
        $country = validDatas($_POST['country']);
        $type = validDatas($_POST['type']);
        $state = validDatas($_POST['state']);
        $competence = validDatas($_POST['competence']);
        $startDate = validDatas($_POST['startDate']);
        $endDate = validDatas($_POST['endDate']);
        $agent = validDatas($_POST['agent']);
        $target = validDatas($_POST['target']);
        $safehouse = validDatas($_POST['safeHouse']);
        $contact = validDatas($_POST['contact']);
        $req = $this->pdo->prepare("
INSERT INTO intelligence_agency.Missions 
    (codeName, title, description, country, type, state, competence, startDate, endDate, codeName_Agent, codeName_Target, code_SafeHouse, codeName_Contact)
    VALUES 
           ('$codeName', '$title', '$description', '$country', '$type', '$state', '$competence', '$startDate', '$endDate', '$agent', '$target', '$safehouse', '$contact')");
        $req->bindValue($codeName, $mission->getCodeName(), PDO::PARAM_STR);
        $req->bindValue($title, $mission->getTitle(), PDO::PARAM_STR);
        $req->bindValue($description, $mission->getDescription(), PDO::PARAM_STR);
        $req->bindValue($country, $mission->getCountry(), PDO::PARAM_STR);
        $req->bindValue($type, $mission->getType(), PDO::PARAM_STR);
        $req->bindValue($state, $mission->getState(), PDO::PARAM_STR);
        $req->bindValue($competence, $mission->getCompetence(), PDO::PARAM_STR);
        $req->bindValue($startDate, $mission->getStartDate(), PDO::PARAM_STR);
/*        $req->bindValue($endDate, $mission->getEndDate(), PDO::PARAM_STR);*/
        $req->bindValue($agent, $mission->getCodeName_Agent());
        $req->bindValue($target, $mission->getCodeName_Target(), PDO::PARAM_STR);
        $req->bindValue($safehouse, $mission->getCode_SafeHouse(), PDO::PARAM_STR);
        $req->bindValue($contact, $mission->getCodeName_Contact(), PDO::PARAM_STR);
        if ($req->execute()) {
            echo 'ok';
            var_dump($_POST);
            return true;
        }else {
            echo 'pas ok';
            return false;
        }
    }

    public function uptdate(MissionsModel $mission)
    {
        $req = $this->pdo->prepare('
UPDATE 
    intelligence_agency.Missions 
SET 
    title = :title, description = :description, country = :country, type = :type, state = :state, competence = :competence, startDate = :startDate, endDate = :endDate, codeName_Agent = :agent, codeName_Target = :target, code_SafeHouse = :safeHouse, codeName_Contact = :contact
WHERE codeName = :codeName
    ');
        $req->bindValue(':title', $mission->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':description', $mission->getDescription(), PDO::PARAM_STR);
        $req->bindValue(':country', $mission->getCountry(), PDO::PARAM_STR);
        $req->bindValue(':agent', $mission->getAgent(), PDO::PARAM_STR);
        $req->bindValue(':target', $mission->getTarget(), PDO::PARAM_STR);
        $req->bindValue(':safeHouse', $mission->getSafeHouse(), PDO::PARAM_STR);
        $req->bindValue(':type', $mission->getType(), PDO::PARAM_STR);
        $req->bindValue(':state', $mission->getState(), PDO::PARAM_STR);
        $req->bindValue(':competence', $mission->getCompetence(), PDO::PARAM_STR);
        $req->bindValue(':startDate', $mission->getStartDate(), PDO::PARAM_STR);
        $req->bindValue(':endDate', $mission->getEndDate());
        $req->bindValue(':contact', $mission->getContact());
        $req->execute();
    }

    public function delete(string $codeName)
    {
        $req = $this->pdo->prepare('DELETE FROM intelligence_agency.Missions WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $req->execute();
    }

    public function getByCodeName(string $codeName): MissionsModel
    {
        $codeName = (string)$codeName;
        $req = $this->pdo->prepare('SELECT * FROM intelligence_agency.Missions WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $data = $req->fetch();
        return new MissionsModel($data);
    }

    public function getAll(): array
    {
        $req = $this->pdo->query('SELECT * FROM intelligence_agency.Missions ORDER BY codeName DESC ');
        $mission = array();
        foreach ($req->fetchAll() as $data) {
            $mission[] = new MissionsModel($data);
        }
        return $mission;
    }
}