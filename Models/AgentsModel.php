<?php

namespace Models;


class AgentsModel
{

    private string $codeName;
    private string $firstname;
    private string $lastname;
    private string $nationality;
    private string $competenceOne;
    private string $competenceTwo;
    private string $competenceThree;
    private string $dateOfBirth;


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


    /**
     * @return string
     */
    public function getCodeName(): string
    {
        return $this->codeName;
    }

    /**
     * @param string $codeName
     * @return AgentsModel
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
     * @return AgentsModel
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
     * @return AgentsModel
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

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
     * @return AgentsModel
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
     * @return AgentsModel
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


}