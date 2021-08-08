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
            header('Location: ?action=Profil');
        }else {
            header('Location: ?action=AgentForm');
        }
    }

    public function deleteAgent() {

    }

}