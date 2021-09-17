<?php

namespace Managers;

use Models\MissionsModel;
use PDO;
use PDOException;

class MissionManager
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
        $state = 'En préparation';
        $competence = validDatas($_POST['competence']);
        $startDate = validDatas($_POST['startDate']);
        $endDate = validDatas($_POST['endDate']);

        var_dump($this->pdo->prepare("
INSERT INTO Missions 
    (codeName, title, description, country, type, state, competence, startDate, endDate)
    VALUES 
           ('$codeName', '$title', '$description', '$country', '$type', '$state', '$competence', '$startDate', '$endDate')"));
        $req->bindValue($codeName, $mission->getCodeName(), PDO::PARAM_STR);
        $req->bindValue($title, $mission->getTitle(), PDO::PARAM_STR);
        $req->bindValue($description, $mission->getDescription(), PDO::PARAM_STR);
        $req->bindValue($country, $mission->getCountry(), PDO::PARAM_STR);
        $req->bindValue($type, $mission->getType(), PDO::PARAM_STR);
        $req->bindValue($state, $mission->getState(), PDO::PARAM_STR);
        $req->bindValue($competence, $mission->getCompetence(), PDO::PARAM_STR);
        $req->bindValue($startDate, $mission->getStartDate(), PDO::PARAM_STR);
        $req->bindValue($endDate, $mission->getEndDate(), PDO::PARAM_STR);
        if ($req->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function uptdate(MissionsModel $mission):bool
    {

        $state = $_POST['uM'];
        $codeName = $_GET['codeName'];

        $req = $this->pdo->prepare("
                UPDATE 
                    Missions 
                SET 
                    state = '$state'
                WHERE codeName = '$codeName'
    ");
        $req->bindValue($state, $mission->getState(), PDO::PARAM_STR);
        if ($req->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function delete(string $codeName)
    {
        $req = $this->pdo->prepare('DELETE FROM Missions WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $req->execute();
    }


    public function getAll(): array
    {
        $req = $this->pdo->query("SELECT * FROM Missions ORDER BY codeName DESC");
        $mission = array();
        foreach ($req->fetchAll() as $data) {
            $mission[] = new MissionsModel($data);
        }
        return $mission;
    }

    public function getData(): array
    {
        $req = $this->pdo->query("SELECT * FROM Missions ORDER BY idun DESC ");
        return $req->fetch();
    }

    public function getAllDatas(string $codeName):array
    {

            $req = $this->pdo->query("
SELECT  
       Missions.*,
       AgentCodeName,
       TargetCodeName,
       ContactCodeName,
       ShCodeName
FROM 
     Missions
    LEFT JOIN 
         (SELECT  
               agent_Mission, GROUP_CONCAT(codeName) AS AgentCodeName
         FROM Agents
             GROUP BY agent_Mission) as amACN 
ON Missions.codeName = agent_Mission

    LEFT JOIN 
         (SELECT  
               target_Mission, GROUP_CONCAT(codeName) AS TargetCodeName
         FROM Targets
             GROUP BY target_Mission) as tMACN 
ON Missions.codeName = target_Mission

    LEFT JOIN 
         (SELECT  
               contact_Mission, GROUP_CONCAT(codeName) AS ContactCodeName
         FROM Contacts
             GROUP BY contact_Mission) as cMACN 
ON Missions.codeName = contact_Mission

    LEFT JOIN 
         (SELECT  
               sf_Mission, GROUP_CONCAT(code) AS ShCodeName
         FROM Safe_houses
             GROUP BY sf_Mission) as sMACN 
ON Missions.codeName = sf_Mission

WHERE codeName = '$codeName'
        ");
            return $req->fetch();
    }

    }
