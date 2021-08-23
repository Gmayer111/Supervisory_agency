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
        $description = addslashes(validDatas($_POST['description'])) ;
        $country = validDatas($_POST['country']);
        $type = validDatas($_POST['type']);
        $state = validDatas($_POST['state']);
        $competence = validDatas($_POST['competence']);
        $startDate = validDatas($_POST['startDate']);
        $endDate = validDatas($_POST['endDate']);
        $req = $this->pdo->prepare("
INSERT INTO intelligence_agency.Missions 
    (codeName, title, description, country, type, state, competence, startDate, endDate)
    VALUES 
           ('$codeName', '$title', '$description', '$country', '$type', '$state', '$competence', '$startDate', '$endDate')");
        $req->bindValue($codeName, $mission->getCodeName(), PDO::PARAM_STR);
        $req->bindValue($title, $mission->getTitle(), PDO::PARAM_STR);
        $req->bindValue($description, $mission->getDescription(), PDO::PARAM_STR);
        $req->bindValue($country, $mission->getCountry(), PDO::PARAM_STR);
        $req->bindValue($type, $mission->getType(), PDO::PARAM_STR);
        $req->bindValue($state, $mission->getState(), PDO::PARAM_STR);
        $req->bindValue($competence, $mission->getCompetence(), PDO::PARAM_STR);
        $req->bindValue($startDate, $mission->getStartDate(), PDO::PARAM_STR);
        if ($req->execute()) {
            var_dump($req->errorInfo());
            return true;
        }else {
            var_dump($req->errorInfo());
            return false;
        }
    }

    public function uptdate(MissionsModel $mission)
    {
        $req = $this->pdo->prepare('
UPDATE 
    intelligence_agency.Missions 
SET 
    title = :title, description = :description, country = :country, type = :type, state = :state, competence = :competence, startDate = :startDate, endDate = :endDate
WHERE codeName = :codeName
    ');
        $req->bindValue(':title', $mission->getTitle(), PDO::PARAM_STR);
        $req->bindValue(':description', $mission->getDescription(), PDO::PARAM_STR);
        $req->bindValue(':country', $mission->getCountry(), PDO::PARAM_STR);
        $req->bindValue(':type', $mission->getType(), PDO::PARAM_STR);
        $req->bindValue(':state', $mission->getState(), PDO::PARAM_STR);
        $req->bindValue(':competence', $mission->getCompetence(), PDO::PARAM_STR);
        $req->bindValue(':startDate', $mission->getStartDate(), PDO::PARAM_STR);
        $req->bindValue(':endDate', $mission->getEndDate());
        $req->execute();
    }

    public function delete(string $codeName)
    {
        $req = $this->pdo->prepare('DELETE FROM intelligence_agency.Missions WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $req->execute();
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

    public function getData(): array
    {
        $req = $this->pdo->query('SELECT * FROM intelligence_agency.Missions ORDER BY idun DESC ');
        return $req->fetch();
    }

    public function getAllDatas():array
    {
        $req = $this->pdo->query('
SELECT * FROM intelligence_agency.Missions 
    LEFT JOIN intelligence_agency.Agents AS Agent 
        ON Missions.codeName = Agent.agent_Mission 
    LEFT JOIN intelligence_agency.Contacts AS Contact 
        ON Missions.codeName = Contact.contact_Mission 
    LEFT JOIN intelligence_agency.Targets AS Target 
        ON Missions.codeName = Target.target_Mission 
    LEFT JOIN intelligence_agency.Safe_houses AS SafeHouse 
        ON Missions.codeName = SafeHouse.sf_Mission 
        ');
        return $req->fetchAll();
    }

    }
