<?php

namespace Controllers;

class FormController
{


    public function formCreate()
    {

        $mission = new MissionController();
        $agent = new AgentController();
        $contact = new ContactController();
        $safeHouse = new SafeHouseController();
        $target = new TargetController();
        $admin = new AdminController();


        if (isset($_POST['create'])) {
            if (isset($_POST['creation-selector']) && $_POST['creation-selector'] === 'rep1') {
                $agent->formAgentVue();
            }elseif (isset($_POST['creation-selector']) && $_POST['creation-selector'] === 'rep2') {
                $mission->formMissionVue();
            }elseif (isset($_POST['creation-selector']) && $_POST['creation-selector'] === 'rep3') {
                $contact->formContactVue();
            }elseif (isset($_POST['creation-selector']) && $_POST['creation-selector'] === 'rep4') {
                $target->formTargetVue();
            }elseif (isset($_POST['creation-selector']) && $_POST['creation-selector'] === 'rep5') {
                $safeHouse->FormSafeHouseVue();
            }elseif (isset($_POST['creation-selector']) && $_POST['creation-selector'] === 'rep6') {
                $admin->FormAdminVue();
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