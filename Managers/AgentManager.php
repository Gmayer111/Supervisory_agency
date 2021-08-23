<?php

namespace Managers;

use Models\AgentsModel;
use PDO;

class AgentManager
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


    public function create(AgentsModel $agent) :bool
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

        $codeName = validDatas($_POST['codeName']);
        $firstname = validDatas($_POST['firstName']);
        $lastname = validDatas($_POST['lastName']);
        $nationality = validDatas($_POST['nationality']);
        $competenceOne = validDatas($_POST['competenceOne']);
        $competenceTwo = validDatas($_POST['competenceTwo']);
        $competenceThree = validDatas($_POST['competenceThree']);
        $dateOfBirth = validDatas($_POST['dateOfBirth']);
        $agent_Mission = $codeNameMission;
        $req = $this->pdo->prepare("
INSERT INTO intelligence_agency.Agents 
    (codeName, firstname, lastname, nationality, competenceOne, competenceTwo, competenceThree, dateOfBirth, agent_Mission)
    VALUES 
           ('$codeName', '$firstname', '$lastname', '$nationality', '$competenceOne', '$competenceTwo', '$competenceThree', '$dateOfBirth', '$agent_Mission')");
        $req->bindValue($codeName, $agent->getCodeName(), PDO::PARAM_STR);
        $req->bindValue($firstname, $agent->getFirstname(), PDO::PARAM_STR);
        $req->bindValue($lastname, $agent->getLastname(), PDO::PARAM_STR);
        $req->bindValue($nationality, $agent->getNationality(), PDO::PARAM_STR);
        $req->bindValue($competenceOne, $agent->getCompetenceOne(), PDO::PARAM_STR);
        $req->bindValue($competenceTwo, $agent->getCompetenceTwo(), PDO::PARAM_STR);
        $req->bindValue($competenceThree, $agent->getCompetenceThree(), PDO::PARAM_STR);
        $req->bindValue($dateOfBirth, $agent->getDateOfBirth(), PDO::PARAM_STR);
        if ($req->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function uptdate(AgentsModel $agent)
    {
        $req = $this->pdo->prepare('
UPDATE 
    intelligence_agency.Agents
SET 
    codeName = :codeName, firstname = :firstName, lastname = :lastName, nationality = :nationality, competenceOne = :competenceOne, competenceTwo = :competenceTwo, competenceThree = :competenceThree, dateOfBirth = :dateOfBirth
    WHERE codeName = :codeName
    ');
        $req->bindValue(':codeName', $agent->getCodeName(), PDO::PARAM_STR);
        $req->bindValue(':firstname', $agent->getFirstname(), PDO::PARAM_STR);
        $req->bindValue(':lastname', $agent->getLastname(), PDO::PARAM_STR);
        $req->bindValue(':nationality', $agent->getNationality(), PDO::PARAM_STR);
        $req->bindValue(':competenceOne', $agent->getCompetenceOne(), PDO::PARAM_STR);
        $req->bindValue(':competenceTwo', $agent->getCompetenceTwo(), PDO::PARAM_STR);
        $req->bindValue(':competenceThree', $agent->getCompetenceThree(), PDO::PARAM_STR);
        $req->bindValue(':dateOfBirth', $agent->getDateOfBirth());
        $req->execute();
    }

    public function delete(string $codeName)
    {
        $req = $this->pdo->prepare('DELETE FROM intelligence_agency.Agents WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $req->execute();
    }

    public function getByCodeName(string $codeName): AgentsModel
    {
        $codeName = (string)$codeName;
        $req = $this->pdo->prepare('SELECT * FROM intelligence_agency.Agents WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $data = $req->fetch();
        return new AgentsModel($data);
    }

    public function getAll(): array
    {

        $req = $this->pdo->query('SELECT * FROM intelligence_agency.Agents ORDER BY codeName DESC ');
        $agent = array();
        foreach ($req->fetchAll() as $data) {
            $agent[] = new AgentsModel($data);
        }
        return $agent;
    }

    public function getData(): array
    {
        $stmt = new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root');
        $r = $stmt->query('SELECT * FROM intelligence_agency.Agents ORDER BY id DESC ');
        return $r->fetch();
    }
}