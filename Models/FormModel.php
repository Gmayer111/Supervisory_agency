<?phpnamespace Models;class FormModel{    public function createFormMission(): array    {        session_start();        function validDatas($data)        {            // Enlève espace inutile            $data = trim($data);            // Supprime les antislashs            $data = stripcslashes($data);            // Echappe caractères type < >            $data = htmlspecialchars($data);            return $data;        }            $dataform = [                'title' => validDatas($_POST['title']),                'description' => validDatas($_POST['description']),                'country' => validDatas($_POST['country']),                'codeName' => validDatas($_POST['codeName']),                'agent' => validDatas($_POST['agent']),                'target' => validDatas($_POST['target']),                'safehouse' => validDatas($_POST['safehouse']),                'type' => validDatas($_POST['type']),                'state' => validDatas($_POST['state']),                'competence' => validDatas($_POST['competence']),                'startDate' => validDatas($_POST['startDate']),                'endDate' => validDatas($_POST['endDate'])            ];            var_dump($dataform);            return $dataform;    }}