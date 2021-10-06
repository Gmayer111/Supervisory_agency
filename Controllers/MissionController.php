<?php

namespace Controllers;

use Managers\MissionManager;
use Models\MissionsModel;

class MissionController
{

    public function ListMissionsVue()
    {
        require_once 'Vues/Missions/ListMissionVue.php';
    }

    public function DetailMissionVue()
    {
        require_once 'Vues/Missions/DetailMissionVue.php';
        return $_GET['codeName'];
    }

    public function formMissionVue()
    {
        require_once 'Vues/Forms/FormMissionVue.php';
    }

    public function createForm()
    {
        $mission = new MissionManager();
        $missionModel = new MissionsModel($_POST);

        if ($mission->create($missionModel) === true) {
            header('Location: ?action=AgentForm');
        }else {
            ?> <script>
                alert('Nom de code déjà utilisé')
                document.location.href = "http://localhost/intelligence-agency/?action=MissionForm"
            </script> <?php
            die();
        }
    }

    public function updateMission()
    {
        $mission = new MissionManager();
        $missionModel = new MissionsModel($_POST);

        if ($mission->uptdate($missionModel) === true) {
            require_once 'Vues/Missions/DetailMissionVue.php';
        }else {
            echo 'erreur';
        }
    }



}