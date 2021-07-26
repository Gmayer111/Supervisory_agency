<?php


namespace Managers;


use Models\MissionsModel;
use PDO;

class MissionManager
{

    private $db;

    public function __construct()
    {
        $this->db = $db;
    }

    // ici j'insère les données 
    public function add(MissionsModel $mission)
    {
        $stmt = $this->db->prepare('
    INSERT INTO intelligence_agency.Missions
        (id, title, description, country, codeName, agent, target, safeHouse, type, state, competence, startDate, endDate) 
        VALUES 
    (:id, :title, :description, :country, :codeName, :agent, :target, :safeHouse, :type, :state, :competence, :startDate, :endDate)');
        $stmt->bindValue(':id', $mission->getId());
        $stmt->bindValue(':title', $mission->getTitle());
        $stmt->bindValue(':description', $mission->getDescription());
        $stmt->bindValue(':country', $mission->getCountry());
        $stmt->bindValue(':codeName', $mission->getCodeName());
        $stmt->bindValue(':agent', $mission->getAgent());
        $stmt->bindValue(':target', $mission->getTarget());
        $stmt->bindValue(':safeHouse', $mission->getSafeHouse());
        $stmt->bindValue(':type', $mission->getType());
        $stmt->bindValue(':state', $mission->getState());
        $stmt->bindValue(':competence', $mission->getCompetence());
        $stmt->bindValue(':startDate', $mission->getStartDate());
        $stmt->bindValue(':endDate', $mission->getEndDate());
        $stmt->execute();
    }

    public function delete(MissionsModel $mission)
    {
        $this->db->exec('DELETE FROM intelligence_agency.Missions WHERE id = '.$mission->getId());
    }

    public function getMissions($id)
    {

        $id = (int) $id;

        $stmt = $this->db->prepare('SELECT * FROM intelligence_agency.Missions WHERE id = '.$id);
        if ($stmt->execute()) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                return new MissionsModel($data);
            }
        }
    }

    public function getMissions()
    {
        $mission = [];

        $stmt = $this->db->prepare('SELECT * FROM intelligence_agency.Missions ORDER BY title');
        if ($stmt->execute()) {

            while($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $mission[] = new MissionsModel($data);
            }
        }
        return $mission;
    }

    public function update(MissionsModel $mission)
    {
        $stmt = $this->db->prepare('
UPDATE 
    intelligence_agency.Missions 
SET 
    title = :title, description = :description, country = :country, codeName = :codeName, agent = :agent, target = :target, safeHouse = :safeHouse, type = :type, state = :state, competence = :competence, startDate = :startDate, endDate = :endDate');
        $stmt->bindValue(':title', $mission->getTitle(), PDO::PARAM_STR);
        $stmt->bindValue(':description', $mission->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':country', $mission->getCountry(), PDO::PARAM_STR);
        $stmt->bindValue(':codeName', $mission->getCodeName(), PDO::PARAM_STR);
        $stmt->bindValue(':agent', $mission->getAgent());
        $stmt->bindValue(':target', $mission->getTarget());
        $stmt->bindValue(':safeHouse', $mission->getSafeHouse() );
        $stmt->bindValue(':type', $mission->getType(), PDO::PARAM_STR);
        $stmt->bindValue(':state', $mission->getState(), PDO::PARAM_STR);
        $stmt->bindValue(':competence', $mission->getCompetence(), PDO::PARAM_STR);
        $stmt->bindValue(':startDate', $mission->getStartDate(), PDO::PARAM_STR);
        $stmt->bindValue(':endDate', $mission->getEndDate(), PDO::PARAM_STR);
        $stmt->execute();
    }
}