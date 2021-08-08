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
        $post = $_POST;
        var_dump($post);
/*        $missionModel = new MissionsModel($_POST);
        if ($mission->create($missionModel) === true) {
            header('Location: ?action=Profil');
            var_dump($_POST);
        }else {
            header('Location: ?action=MissionForm');
            var_dump($_POST);
        }*/
    }
}