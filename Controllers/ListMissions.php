<?php

namespace Controllers;


class ListMissions
{
    public function ListMissionsVue()
    {
        echo require_once 'Vues/Missions/DetailMissionVue.php';
    }
}