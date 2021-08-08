<?php


namespace Controllers;


use Managers\AdminManager;
use Models\AdminsModel;

class AdminController
{
    public function FormAdminVue()
    {
        echo require_once 'Vues/Forms/FormAdminVue.php';
    }

    public function createForm()
    {
        $admin = new AdminManager();
        $adminModel = new AdminsModel($_POST);

        if ($admin->create($adminModel) === true) {
            header('Location: ?action=Profil');
        }else {
            echo 'erreur';
            header('Location: ?action=MissionForm');
        }
    }
}