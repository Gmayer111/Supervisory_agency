<?php


namespace Controllers;


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





}