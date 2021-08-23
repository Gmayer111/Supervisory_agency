<?phpuse Controllers\AdminController;use Controllers\AgentController;use Controllers\ContactController;use Controllers\FormController;use Controllers\LoginController;use Controllers\MissionController;use Controllers\ProfilController;use Controllers\SafeHouseController;use Controllers\TargetController;ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);require_once 'Autoloader.php';Autoloader::register();$profilController = new ProfilController();$loginController = new LoginController();$formController = new FormController();$missionController = new MissionController();$agentController = new AgentController();$contactController = new ContactController();$safeHouseController = new SafeHouseController();$targetController = new TargetController();$adminController = new AdminController();if (isset($_GET['action'])) {    switch ($_GET['action']){        case 'Login':            $loginController->loginVue();            break;        case 'Logged':            $loginController->login();            break;        case 'Logout':            $loginController->logout();            break;        case 'Profil':            $profilController->profilVue();            break;        case 'Form':            $formController->formCreate();            break;        // MISSION TABLE //        case 'List':            $missionController->ListMissionsVue();            break;        case 'Detail':            $missionController->DetailMissionVue();            break;        // MISSION FORM        case 'MissionForm':            $missionController->formMissionVue();            break;        case 'CreateMission':            $missionController->createForm();            break;        // AGENT //        case 'AgentForm':            $agentController->formAgentVue();            break;        case 'CreateAgent':            $agentController->createForm();            break;        // CONTACT //        case 'ContactForm':            $contactController->FormContactVue();            break;        case 'CreateContact':            $contactController->createForm();            break;        // TARGET //        case 'TargetForm':            $targetController->formTargetVue();            break;        case 'CreateTarget':            $targetController->createForm();            break;        // SAFEHOUSE //        case 'SafeHouseForm':            $safeHouseController->formSafeHouseVue();            break;        case 'CreateSafeHouse':            $safeHouseController->createForm();            break;        //  ADMIN //        case 'AdminForm':            $adminController->FormAdminVue();            break;    }}else {    echo require_once 'Vues/HomeVue.php';}