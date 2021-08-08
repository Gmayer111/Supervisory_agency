<?php

namespace Managers;

use Models\ContactsModel;
use PDO;

class ContactManager
{

    private $pdo;

    public function __construct()
    {
        $this->setPdo(new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root'));
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


    public function create(ContactsModel $contact) :bool
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


        $codeName = validDatas($_POST['codeName']);
        $firstname = validDatas($_POST['firstName']);
        $lastname = validDatas($_POST['lastName']);
        $nationality = validDatas($_POST['nationality']);
        $dateOfBirth = validDatas($_POST['dateOfBirth']);
        $req = $this->pdo->prepare("
INSERT INTO intelligence_agency.Contacts 
    (codeName, firstname, lastname, nationality, dateOfBirth)
    VALUES 
           ('$codeName', '$firstname', '$lastname', '$nationality', '$dateOfBirth')");
        $req->bindValue($codeName, $contact->getCodeName(), PDO::PARAM_STR);
        $req->bindValue($firstname, $contact->getFirstname(), PDO::PARAM_STR);
        $req->bindValue($lastname, $contact->getLastname(), PDO::PARAM_STR);
        $req->bindValue($nationality, $contact->getNationality(), PDO::PARAM_STR);
        $req->bindValue($dateOfBirth, $contact->getDateOfBirth(), PDO::PARAM_STR);
        $req->execute();

        return true;
    }

    public function uptdate(ContactsModel $contact)
    {
        $req = $this->pdo->prepare('
UPDATE 
    intelligence_agency.Contacts 
SET 
    codeName = :codeName, firstname = :firstName, lastname = :lastName, nationality = :nationality, dateOfBirth = :dateOfBirth
    WHERE codeName = :codeName
    ');
        $req->bindValue(':codeName', $contact->getCodeName(), PDO::PARAM_STR);
        $req->bindValue(':firstname', $contact->getFirstname(), PDO::PARAM_STR);
        $req->bindValue(':lastname', $contact->getLastname(), PDO::PARAM_STR);
        $req->bindValue(':nationality', $contact->getNationality(), PDO::PARAM_STR);
        $req->bindValue(':dateOfBirth', $contact->getDateOfBirth(), PDO::PARAM_STR);
        $req->execute();
    }

    public function delete(string $codeName)
    {
        $req = $this->pdo->prepare('DELETE FROM intelligence_agency.Contacts WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $req->execute();
    }

    public function getByCodeName(string $codeName): ContactsModel
    {
        $codeName = (string)$codeName;
        $req = $this->pdo->prepare('SELECT * FROM intelligence_agency.Contacts WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $data = $req->fetch();
        return new ContactsModel($data);
    }

    public function getAll(): array
    {

        $req = $this->pdo->query('SELECT * FROM intelligence_agency.Contacts ORDER BY codeName DESC ');
        $contact = array();
        foreach ($req->fetchAll() as $data) {
            $contact[] = new ContactsModel($data);
        }
        return $contact;
    }
}