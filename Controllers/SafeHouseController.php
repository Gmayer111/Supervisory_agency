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
            if ($_POST['next'] === 'Suivant') {
            header('Location: ?action=Profil');
            }else {
                header('Location: ?action=SafeHouseForm');
            }
        }else {
        ?> <script>alert('Erreur')</script> <?php
        echo 'erreur';
        }
    }

    public function deleteSh()
    {
        $safeHouseManager = new SafeHouseManager();
        if ($safeHouseManager->delete($_POST['dtsh']) === true) {
            header('Location: ?action=Detail');
        }else {
            header('Location: ?action=Detail');
        }
    }



}