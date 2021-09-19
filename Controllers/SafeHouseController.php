<?php


namespace Controllers;


use Managers\SafeHouseManager;
use Models\SafeHousesModel;

class SafeHouseController
{

    public function formSafeHouseVue()
    {
         require_once 'Vues/Forms/FormSafeHouseVue.php';
    }

    public function createForm()
    {
        $safeHouse = new SafeHouseManager();
        $safeHouseModel = new SafeHousesModel($_POST);

        if ($safeHouse->create($safeHouseModel) === true) {
            if ($_POST['next'] === 'Suivant') {
            header('Location: ?action=Profil');
            }else {
                header('Location: ?action=SafeHouseForm');
            }
        }else {
            ?> <script>
                alert('Code déjà emprunté')
                document.location.href = "http://localhost/intelligence-agency/?action=SafeHouseForm"
            </script> <?php
            die();
        }
    }

    public function deleteSh()
    {
        $safeHouseManager = new SafeHouseManager();
        $mission = new MissionController();

        if ($safeHouseManager->delete($_POST['dtsh']) === true) {
            $mission->DetailMissionVue();
        }else {
            $mission->DetailMissionVue();
        }
    }



}