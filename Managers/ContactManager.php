<?php

namespace Managers;

use Models\ContactsModel;
use PDO;
use PDOException;

class ContactManager
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


    public function create(ContactsModel $contact) :bool
    {

        $missionManager = new MissionManager();
        $codeNameMission = $missionManager->getData()[0];
        $ct_Mission = $codeNameMission;
        $req = $this->pdo->prepare("
INSERT INTO Contacts 
    (codeName, firstname, lastname, nationality, dateOfBirth, contact_Mission)
VALUES 
    (:codeName, :firstname, :lastname, :nationality, :dateOfBirth, :contact_Mission)");
        $req->bindValue(':codeName', $contact->getCodeName(), PDO::PARAM_STR);
        $req->bindValue(':firstname', $contact->getFirstname(), PDO::PARAM_STR);
        $req->bindValue(':lastname', $contact->getLastname(), PDO::PARAM_STR);
        $req->bindValue(':nationality', $contact->getNationality(), PDO::PARAM_STR);
        $req->bindValue(':dateOfBirth', $contact->getDateOfBirth(), PDO::PARAM_STR);
        $req->bindValue(':contact_Mission', $ct_Mission, PDO::PARAM_STR);
        if ($req->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function uptdate(ContactsModel $contact)
    {
        $req = $this->pdo->prepare('
UPDATE 
    Contacts 
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

    public function delete(string $codeName):bool
    {
        $req = $this->pdo->prepare('DELETE FROM Contacts WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        if ($req->execute()) {
            return true;
        }else {
            return false;
        }
    }

    public function getByCodeName(string $codeName): ContactsModel
    {
        $codeName = (string)$codeName;
        $req = $this->pdo->prepare('SELECT * FROM Contacts WHERE codeName = :codeName');
        $req->bindValue(':codeName', $codeName, PDO::PARAM_STR);
        $data = $req->fetch();
        return new ContactsModel($data);
    }

    public function getAll(): array
    {

        $req = $this->pdo->query('SELECT * FROM Contacts ORDER BY codeName DESC ');
        $contact = array();
        foreach ($req->fetchAll() as $data) {
            $contact[] = new ContactsModel($data);
        }
        return $contact;
    }
}