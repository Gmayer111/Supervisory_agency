<?php

namespace Controllers;


class ListMissionsController
{
    public function ListMissionsVue()
    {
        echo require_once 'Vues/Missions/ListMissionVue.php';
    }
}