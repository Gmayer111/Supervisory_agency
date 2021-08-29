<?php


namespace Controllers;


use Models\AgentsModel;
use Managers\AgentManager;

class AgentController
{

    public function formAgentVue()
    {
        echo require_once 'Vues/Forms/FormAgentVue.php';
    }

    public function createForm()
    {
        $agentManager = new AgentManager();
        $agentModel = new AgentsModel($_POST);
        
        if ($agentManager->create($agentModel) === true) {
            if ($_POST['next'] === 'Suivant') {
                header('Location: ?action=TargetForm');
            }else {
                header('Location: ?action=AgentForm');
            }
        }else {
            ?> <script>alert('Erreur')</script> <?php
            echo 'erreur';
        }
    }



    public function deleteAgent()
    {
        $agentManager = new AgentManager();

        if ($agentManager->delete($_POST['dta']) === true) {
            header('Location: ?action=Detail');
        }else {
            header('Location: ?action=Detail');
        }

    }

}