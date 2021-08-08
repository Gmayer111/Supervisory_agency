<?php


namespace Controllers;


use Managers\SafeHouseManager;
use Models\SafeHousesModel;

class SafeHouseController
{

    public function formSafeHouseVue()
    {
        echo require_once 'Vues/Forms/FormSafeHouseVue.php';
    }

    public function createForm()
    {
        $safeHouse = new SafeHouseManager();
        $safeHouseModel = new SafeHousesModel($_POST);

        if ($safeHouse->create($safeHouseModel) === true) {
            header('Location: ?action=Profil');
        }else {
            echo 'erreur';
            header('Location: ?action=MissionForm');
        }
    }
}