<?php


namespace Controllers;


use Models\AgentsModel;
use Managers\AgentManager;

class AgentController
{

    public function formAgentVue()
    {
        require_once 'Vues/Forms/FormAgentVue.php';
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
            ?> <script>
                alert('CodeName déjà emprunté')
                document.location.href = "http://localhost/intelligence-agency/?action=AgentForm"
            </script> <?php
            die();
        }
    }



    public function deleteAgent()
    {
        $agentManager = new AgentManager();
        $mission = new MissionController();

        if ($agentManager->delete($_POST['dta']) === true) {
            $mission->DetailMissionVue();
        }else {
            $mission->DetailMissionVue();
        }

    }

}