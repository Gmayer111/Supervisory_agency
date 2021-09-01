<?php

namespace Managers;

use Models\AdminsModel;
use PDO;
use ReflectionClass;
use ReflectionException;

class LoginManager
{

    public function login(): bool
    {

        session_start();

        function validData($data)
        {
            // Enlève espace inutile
            $data = trim($data);
            // Supprime les antislashs
            $data = stripcslashes($data);
            // Echappe caractères type < >
            $data = htmlspecialchars($data);
            return $data;
        }

        $codeName = validData($_POST['CodeName']);

        $pdo = new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root');
        $stmt = $pdo->prepare('SELECT * FROM intelligence_agency.Admins WHERE codeName = :codeName');
        $stmt->bindValue(':codeName', $codeName);
        if ($stmt->execute()) {
            $reflector = new ReflectionClass(AdminsModel::class);
            try {
                // Je crée une instance de ma classe admin en ignorant le constructeur
                $instance = $reflector->newInstanceWithoutConstructor();
                while ($user = $stmt->fetchObject(get_class($instance))) {
                    $password = $user->getPassword();
                    if (password_verify(validData($_POST['password']), $password)) {
                        $_SESSION['CodeName'] = 'Gaël';
                        return true;
                    }else {
                        return false;
                    }
                }
            } catch (ReflectionException $e) {
                echo $e->getMessage();
            }
        }
        return false;
    }

}
