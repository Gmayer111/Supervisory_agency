<?php

namespace Controllers;

class FormController
{


    public function formCreate()
    {

        if (isset($_POST['create'])) {
            if (isset($_POST['creation-selector']) && $_POST['creation-selector'] === 'rep1') {
                header('Location: ?action=AgentForm');
            }elseif (isset($_POST['creation-selector']) && $_POST['creation-selector'] === 'rep2') {
                header('Location: ?action=MissionForm');
            }elseif (isset($_POST['creation-selector']) && $_POST['creation-selector'] === 'rep3') {
                header('Location: ?action=ContactForm');
            }elseif (isset($_POST['creation-selector']) && $_POST['creation-selector'] === 'rep4') {
                header('Location: ?action=TargetForm');
            }elseif (isset($_POST['creation-selector']) && $_POST['creation-selector'] === 'rep5') {
                header('Location: ?action=SafeHouseForm');
            }elseif (isset($_POST['creation-selector']) && $_POST['creation-selector'] === 'rep6') {
                header('Location: ?action=AdminForm');
            }
        }else {
            echo 'erreur à la création';
        }
    }

    public function delete()
    {

        if (isset($_POST['delete'])) {
            switch (isset($_POST['delete-selector'])) {
                case 'rep1':
                    header('Location: ?action=Agent');
                    break;
                case 'rep2':
                    header('Location: ?action=Mission');
                    break;
                case 'rep3':
                    header('Location: ?action=Contact');
                    break;
                case 'rep4':
                    header('Location: ?action=Cible');
                    break;
                case 'rep5':
                    header('Location: ?action=Planque');
                    break;
                case 'rep6':
                    header('Location: ?action=Admin');
                    break;
            }
        }else {
            echo 'erreur à la création';
        }
    }

    public function update()
    {

        if (isset($_POST['update'])) {
            switch (isset($_POST['update-selector'])) {
                case 'rep1':
                    header('Location: ?action=Agent');
                    break;
                case 'rep2':
                    header('Location: ?action=Mission');
                    break;
                case 'rep3':
                    header('Location: ?action=Contact');
                    break;
                case 'rep4':
                    header('Location: ?action=Cible');
                    break;
                case 'rep5':
                    header('Location: ?action=Planque');
                    break;
                case 'rep6':
                    header('Location: ?action=Admin');
                    break;
            }
        }else {
            echo 'erreur à la création';
        }
    }

}