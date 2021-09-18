<?php

namespace Managers;

use Models\AgentsModel;
use PDO;
use PDOException;

class AgentManager
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


    public function create(AgentsModel $agent) :bool
    {

        $missionManager = new MissionManager();
        $codeNameMission = $missionManager->getData()[0];
        $req = $this->pdo->prepare("
INSERT INTO Agents 
    (codeName, firstname, lastname, nationality, competenceOne, competenceTwo, competenceThree, dateOfBirth, agent_Mission)
VALUES 
    (:codeName, :firstname, :lastname, :nationality, :competenceOne, :competenceTwo, :competenceThree, :dateOfBirth, :agent_Mission)");
        $req->bindValue(':codeName', $agent->getCodeName(), PDO::PARAM_STR);
        $req->bindValue(':firstname', $agent->getFirstname(), PDO::PARAM_STR);
        $req->bindValue(':lastname', $agent->getLastname(), PDO::PARAM_STR);
        $req->bindValue(':nationality', $agent->getNationality(), PDO::PARAM_STR);
        $req->bindValue(':competenceOne', $agent->getCompetenceOne(), PDO::PARAM_STR);
        $req->bindValue(':competenceTwo', $agent->getCompetenceTwo(), PDO::PARAM_STR);
        $req->bindValue(':competenceThree', $agent->getCompetenceThree(), PDO::PARAM_STR);
        $req->bindValue(':dateOfBirth', $agent->getDateOfBirth(), PDO::PARAM_STR);
        $req->bindValue(':agent_Mission', $codeNameMission, PDO::PARAM_STR);
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
    Agents
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


    public function delete(string $codeName):bool
    {
        $req = $this->pdo->prepare('DELETE FROM Agents WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        if ($req->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function getByCodeName(string $codeName): AgentsModel
    {
        $codeName = (string)$codeName;
        $req = $this->pdo->prepare('SELECT * FROM Agents WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $data = $req->fetch();
        return new AgentsModel($data);
    }

    public function getAll(): array
    {

        $req = $this->pdo->query('SELECT * FROM Agents ORDER BY codeName DESC ');
        $agent = array();
        foreach ($req->fetchAll() as $data) {
            $agent[] = new AgentsModel($data);
        }
        return $agent;
    }

    public function getData(): array
    {
        $r = $this->pdo->query('SELECT * FROM Agents ORDER BY id DESC ');
        return $r->fetch();
    }
}