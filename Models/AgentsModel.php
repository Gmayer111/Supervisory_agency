<?php

namespace Agent;

use DateTime;
use Models\MissionsModel;

class AgentsModel
{
    private int $id;
    private string $firstname;
    private string $lastname;
    private DateTime $dateOfBirth;
    private string $nationality;
    private string $competenceOne;
    private string $competenceTwo;
    private string $competenceThree;
    private string $password;
    private MissionsModel $mission;
    private string $codeName;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

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
     */
    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompetenceOne(): string
    {
        return $this->competenceOne;
    }

    /**
     * @param string $competenceOne
     */
    public function setCompetenceOne(string $competenceOne): self
    {
        $this->competenceOne = $competenceOne;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompetenceTwo(): string
    {
        return $this->competenceTwo;
    }

    /**
     * @param string $competenceTwo
     */
    public function setCompetenceTwo(string $competenceTwo): void
    {
        $this->competenceTwo = $competenceTwo;
    }

    /**
     * @return string
     */
    public function getCompetenceThree(): string
    {
        return $this->competenceThree;
    }

    /**
     * @param string $competenceThree
     */
    public function setCompetenceThree(string $competenceThree): void
    {
        $this->competenceThree = $competenceThree;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return MissionsModel
     */
    public function getMission(): MissionsModel
    {
        return $this->mission;
    }

    /**
     * @param MissionsModel $mission
     */
    public function setMission(MissionsModel $mission): self
    {
        $this->mission = $mission;

        return $this;
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
     */
    public function setCodeName(string $codeName): self
    {
        $this->codeName = $codeName;

        return $this;
    }


}