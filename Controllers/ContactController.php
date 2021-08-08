<?php


namespace Controllers;


use Models\ContactsModel;
use Managers\ContactManager;

class ContactController
{

    public function FormContactVue()
    {
        echo require_once 'Vues/Forms/FormContactVue.php';
    }

    public function createForm()
    {
        $contactManager = new ContactManager();
        $contactModel = new ContactsModel($_POST);

        if ($contactManager->create($contactModel) === true) {
            header('Location: ?action=Profil');
        }else {
            echo 'erreur';
            header('Location: ?action=ContactForm');
        }
    }
}