<?php


namespace Controllers;


use Managers\AdminManager;

class AdminController
{
    public function FormAdminVue()
    {
        require_once 'Vues/Forms/FormAdminVue.php';
    }

    public function createForm()
    {

        $admin = new AdminManager();
        $admin->ajaxConnect();

    }
}