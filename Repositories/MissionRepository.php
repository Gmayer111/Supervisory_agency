<?php


namespace Repositories;

use Agent\AgentsModel;
use Mission\MissionsModel;
use SafeHouse\SafeHousesModel;
use Target\TargetsModel;

class MissionRepository
{
    public function create()
    {
        $mission = new MissionsModel($id, $title, $description, $country, $codeName, $agent, $target, $safeHouse, $type, $state, $competence, $startDate, $endDate);


            $title = $_POST[''];
            $description = $_POST[''];
            $country = $_POST[''];
            $codeName = $_POST[''];
            $agent = $_POST[''];
            $target = $_POST[''];
            $safeHouse = $_POST[''];
            $type = $_POST[''];
            $state = $_POST[''];
            $competence = $_POST[''];
            $startDate = $_POST[''];
            $endDate = $_POST[''];


    }
}