<?phpuse Controllers\DetailMissionsController;use Controllers\ListMissionsController;use Controllers\LoginController;use Controllers\ProfilController;ini_set('display_errors', 1);ini_set('display_startup_errors', 1);error_reporting(E_ALL);require_once 'Autoloader.php';Autoloader::register();$loginController = new LoginController();$detailMission = new DetailMissionsController();$listMission = new ListMissionsController();$profilController = new ProfilController();if (isset($_GET['action'])) {    switch ($_GET['action']){        case 'List':            $listMission->ListMissionsVue();            break;        case 'Detail':            $detailMission->DetailMissionVue();            break;        case 'Login':            $loginController->loginVue();            break;        case 'Profil':            $profilController->profilVue();            break;    }}else {    echo require_once 'Vues/HomeVue.php';}