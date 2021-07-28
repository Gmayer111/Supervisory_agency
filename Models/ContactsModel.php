<?php


namespace Contact;

use DateTime;

class ContactsModel
{
    private string $codeName;
    private string $firstname;
    private string $lastname;
    private DateTime $dateOfBirth;
    private string $nationality;

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
        $this->codeName = $codeName;

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
        $this->firstname = $firstname;

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
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateOfBirth(): DateTime
    {
        return $this->dateOfBirth;
    }

    /**
     * @param DateTime $dateOfBirth
     * @return ContactsModel
     */
    public function setDateOfBirth(DateTime $dateOfBirth): self
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


}