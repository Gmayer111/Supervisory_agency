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
        if ($_POST['next'] === 'Suivant') {
            header('Location: ?action=SafeHouseForm');
        }else {
            header('Location: ?action=ContactForm');
        }
            }else {
        ?> <script>alert('Erreur')</script> <?php
        echo 'erreur';
        }
    }
}