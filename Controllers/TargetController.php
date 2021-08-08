<?php


namespace Controllers;


use Managers\TargetManager;
use Models\TargetsModel;

class TargetController
{
    public function formTargetVue()
    {
        echo require_once 'Vues/Forms/FormTargetVue.php';
    }

    public function createForm()
    {
        $target = new TargetManager();
        $targetModel = new TargetsModel($_POST);

        if ($target->create($targetModel) === true) {
            header('Location: ?action=Profil');
        }else {
            echo 'erreur';
            header('Location: ?action=TargetForm');
        }
    }

}