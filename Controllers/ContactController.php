<?php


namespace Controllers;


use Models\ContactsModel;
use Managers\ContactManager;

class ContactController
{

    public function FormContactVue()
    {
        require_once 'Vues/Forms/FormContactVue.php';
    }

    public function createForm()
    {
        $contactManager = new ContactManager();
        $contactModel = new ContactsModel($_POST);

        if ($contactManager->create($contactModel) === true) {
        if ($_POST['next'] === 'Suivant') {
            header('Location: ?action=SafeHouseForm');
        }else {
            ?> <script>
                alert('Nom de code déjà utilisé')
                document.location.href = "http://localhost/intelligence-agency/?action=ContactForm"
            </script> <?php
            die();
        }
            }else {
            ?> <script>
                alert('CodeName déjà emprunté')
                document.location.href = "http://localhost/intelligence-agency/?action=ContactForm"
            </script> <?php
            die();
        }
    }

    public function deleteContact()
    {
        $contactManager = new ContactManager();
        $mission = new MissionController();

        if ($contactManager->delete($_POST['dtc']) === true) {
            $mission->DetailMissionVue();
        }else {
            $mission->DetailMissionVue();
        }
    }
}