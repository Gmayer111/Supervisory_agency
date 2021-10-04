<?php

namespace Managers;

use Models\AdminsModel;
use PDO;
use PDOException;
use ReflectionClass;
use ReflectionException;

class LoginManager
{

    private $pdo;

    public function __construct()
    {

        if (getenv('JAWSDB_URL') !== false) {

            $dbparts = parse_url(getenv('JAWSDB_URL'));
            $hostname = $dbparts['host'];
            $username = $dbparts['user'];
            $password = $dbparts['pass'];
            $database = ltrim($dbparts['path'],'/');
            try {
                $this->setPdo(new PDO("mysql:host=$hostname;dbname=$database", $username, $password));
            }catch (PDOException $e) {
                echo 'Connected failed :' . $e->getMessage();
            }
        }else {
            try {
                $this->setPdo(new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root'));
            }catch (PDOException $e) {
                echo 'Connected failed :' . $e->getMessage();
            }

        }

    }

    /**
     * @return mixed
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param mixed $pdo
     */
    public function setPdo($pdo): void
    {
        $this->pdo = $pdo;
    }


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

        $stmt = $this->pdo->prepare('SELECT * FROM Admins WHERE codeName = :codeName');
        $stmt->bindValue(':codeName', $codeName);
        if ($stmt->execute()) {
            $reflector = new ReflectionClass(AdminsModel::class);
            try {
                // Je crée une instance de ma classe admin en ignorant le constructeur
                $instance = $reflector->newInstanceWithoutConstructor();
                while ($user = $stmt->fetchObject(get_class($instance))) {
                    $password = $user->getPassword();
                    if (password_verify(validData($_POST['password']), $password)) {
                        $_SESSION['User'] = $user;
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
