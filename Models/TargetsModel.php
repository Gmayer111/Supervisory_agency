<?php


namespace Target;

use DateTime;

class TargetsModel
{
    private string $codeName;
    private string $firstname;
    private string $lastname;
    private DateTime $dateOfBirth;
    private string $nationality;
    private string $localisation;

    /**
     * @return string
     */
    public function getCodeName(): string
    {
        return $this->codeName;
    }

    /**
     * @param string $codeName
     * @return TargetsModel
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
     * @return TargetsModel
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
     * @return TargetsModel
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
     * @return TargetsModel
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
     * @return TargetsModel
     */
    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocalisation(): string
    {
        return $this->localisation;
    }

    /**
     * @param string $localisation
     * @return TargetsModel
     */
    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }


}