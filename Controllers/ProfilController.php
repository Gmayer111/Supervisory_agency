<?php


namespace Controllers;

use Managers\AdminManager;

class ProfilController
{

    public function profilVue()
    {
        require_once 'Vues/ProfilVue.php';
    }

    public function updateAdmin ()
    {
        $admin = new AdminManager();
        $admin->ajaxUptdate();
    }



}