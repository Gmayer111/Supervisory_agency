<?phpnamespace Controllers;use Models\LoginModel;class LoginController{    public function loginVue()    {        require_once 'Vues/LoginVue.php';    }    public function login()    {        $login = new LoginModel();        if ($login->login()) {            require_once 'Vues/ProfilVue.php';        }else {            require_once 'Vues/LoginVue.php';        }    }}