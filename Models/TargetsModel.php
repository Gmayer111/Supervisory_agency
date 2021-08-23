<?php


namespace Models;

class TargetsModel
{
    private string $codeName;
    private string $firstname;
    private string $lastname;
    private string $dateOfBirth;
    private string $nationality;
    private string $localisation;
    private ?string $target_Mission = null;


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
     * @return string
     */
    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    /**
     * @param string $dateOfBirth
     * @return TargetsModel
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

    /**
     * @return string|null
     */
    public function getTargetMission(): ?string
    {
        return $this->target_Mission;
    }

    /**
     * @param string|null $target_Mission
     */
    public function setTargetMission(?string $target_Mission): void
    {
        $this->target_Mission = $target_Mission;
    }





}