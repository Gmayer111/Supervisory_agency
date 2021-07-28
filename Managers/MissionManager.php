<?php
//stop 40:34

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


    public function create(MissionsModel $mission)
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
        $agent = validDatas($_POST['agent']);
        $target = validDatas($_POST['target']);
        $safehouse = validDatas($_POST['safehouse']);
        $contact = validDatas($_POST['contact']);
        $type = validDatas($_POST['type']);
        $state = validDatas($_POST['state']);
        $competence = validDatas($_POST['competence']);
        $startDate = validDatas($_POST['startDate']);
        $endDate = validDatas($_POST['endDate']);
        $req = $this->pdo->prepare("
INSERT INTO intelligence_agency.Missions 
    (codeName, title, description, country, agent, target, safeHouse, type, state, competence, startDate, endDate, contact) 
    VALUES 
           ('$codeName', '$title', '$description', '$country', '$agent', '$target', '$safehouse', '$type', '$state', '$competence', '$startDate', '$endDate', '$contact')");
        $req->bindValue(':codeName', $mission->getCodeName(), PDO::PARAM_STR);
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
        $req->bindValue(':endDate', $mission->getEndDate(), PDO::PARAM_STR);
        $req->bindValue(':contact', $mission->getContact(), PDO::PARAM_STR);
        $req->execute();
    }

    public function uptdate(MissionsModel $mission)
    {
        $req = $this->pdo->prepare('
UPDATE 
    intelligence_agency.Missions 
SET 
    title = :title, description = :description, country = :country, agent = :agent, target = :target, safeHouse = :safeHouse, type = :type, state = :state, competence = :competence, startDate = :startDate, endDate = :endDate, contact = :contact
WHERE codeName = :codeName
    ');
/*        $req->bindValue(':codeName', $mission->getCodeName(), PDO::PARAM_STR);    */
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
        $article = array();
        foreach ($req->fetchAll() as $data) {
            $article[] = new MissionsModel($data);
        }
        return $article;
    }
}