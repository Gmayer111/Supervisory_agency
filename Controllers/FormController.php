<?php

namespace Controllers;

use Models\FormModel;

class FormController
{

    public function formVue()
    {
        echo require_once 'Vues/FormVue.php';
    }


    public function formCreate()
    {
        $formData = new FormModel();
        $formData->createForm();

    }

}