<?php

namespace Controllers;

use Managers\MissionManager;
use Models\MissionsModel;

class MissionController
{

    public function ListMissionsVue()
    {
        echo require_once 'Vues/Missions/ListMissionVue.php';
    }

    public function DetailMissionVue()
    {
        echo require_once 'Vues/Missions/DetailMissionVue.php';
    }

    public function formMissionVue()
    {
        echo require_once 'Vues/Forms/FormMissionVue.php';
    }

    public function createForm()
    {
        $mission = new MissionManager();
        $missionModel = new MissionsModel($_POST);

        if ($mission->create($missionModel) === true) {
            header('Location: ?action=AgentForm');
        }else {
            header('Location: ?action=MissionForm');
        }
    }



}