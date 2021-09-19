<?php


namespace Models;

class ContactsModel
{
    private string $codeName;
    private string $firstname;
    private string $lastname;
    private string $dateOfBirth;
    private string $nationality;
    private ?string $contact_Mission = null;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }


    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value); //this->setId...
            }
        }
    }

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

    /**
     * @return string
     */
    public function getCodeName(): string
    {
        return $this->codeName;
    }

    /**
     * @param string $codeName
     * @return ContactsModel
     */
    public function setCodeName(string $codeName): self
    {
        $this->codeName = $this->validDatas($codeName);

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return ContactsModel
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $this->validDatas($firstname);

        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return ContactsModel
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $this->validDatas($lastname);

        return $this;
    }

    /**
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    /**
     * @param string $dateOfBirth
     * @return ContactsModel
     */
    public function setDateOfBirth(string $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }



    /**
     * @return string
     */
    public function getNationality(): string
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     * @return ContactsModel
     */
    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContactMission(): ?string
    {
        return $this->contact_Mission;
    }

    /**
     * @param string|null $contact_Mission
     */
    public function setContactMission(?string $contact_Mission): void
    {
        $this->contact_Mission = $contact_Mission;
    }




}