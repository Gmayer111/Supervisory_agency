<?php


namespace Controllers;


use Managers\TargetManager;
use Models\TargetsModel;

class TargetController
{
    public function formTargetVue()
    {
        require_once 'Vues/Forms/FormTargetVue.php';
    }

    public function createForm()
    {
        $target = new TargetManager();
        $targetModel = new TargetsModel($_POST);
        if ($target->create($targetModel) === true) {
            if ($_POST['next'] === 'Suivant') {
                header('Location: ?action=ContactForm');
            }else {
                header('Location: ?action=TargetForm');
            }
        }else {
        ?> <script>alert('Erreur')</script> <?php
        echo 'erreur';
        }
    }

    public function deleteTarget()
    {
        $targetManager = new TargetManager();
        $mission = new MissionController();

        if ($targetManager->delete($_POST['dtt']) === true) {
            $mission->DetailMissionVue();
        }else {
            $mission->DetailMissionVue();
        }
    }

}