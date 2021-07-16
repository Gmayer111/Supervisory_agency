<?php

namespace Controllers;


class ListMissions
{
    public function ListMissions()
    {
        echo require_once 'Vues/Missions/Detail-Mission-Vue.php';
    }
}