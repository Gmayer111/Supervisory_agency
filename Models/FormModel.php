<?php

namespace Models;

use PDO;

class FormModel
{

    public function createForm()
    {

        function validDatas($data)
        {
            // Enlève espace inutile
            $data = trim($data);
            // Supprime les antislashs
            $data = stripcslashes($data);
            // Echappe caractères type < >
            $data = htmlspecialchars($data);
            return $data;
        }

        $title = validDatas($_POST['title']);
        $codeName = validDatas($_POST['codeName']);
        $country = validDatas($_POST['country']);
        $state = validDatas($_POST['state']);

        $pdo = new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root');
        $stmt = $pdo->prepare('');
        $stmt->bindValue(':codeName', $codeName);
        $stmt->bindValue(':password', $password);

        $stmt->setFetchMode(PDO::FETCH_CLASS, AdminsModel::class);
        if ($stmt->execute()) {
            $users = $stmt->fetchAll();
            foreach ($users as $user) {
                $password = $user->getPassword();
                $codeName = $user->getCodeName();
            }
        }
    }

}

// il faut instancier chaque models
// récupérer les propriétés des models
// La clé doit correspondre à la propriété de ma classe
// le label doit correspondre au nom de la clé en fr/en