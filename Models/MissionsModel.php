<?php

namespace Models;


class MissionsModel
{

    private string $codeName;
    private string $title;
    private string $description;
    private string $country;
    private string $type;
    private string $state;
    private string $competence;
    private string $startDate;
    private string $endDate;
    private ?string $codeName_Agent = null; // penser à typer AgentModel
    private ?string $codeName_Target = null; // penser à typer TargetModel
    private ?string $code_SafeHouse = null; // penser à typer SafeHouseModel
    private ?string $codeName_Contact = null; // penser à typer COntactModel

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
     * @return MissionsModel
     */
    public function setCodeName(string $codeName): self
    {
        $this->codeName = $codeName;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return MissionsModel
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return MissionsModel
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return MissionsModel
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return MissionsModel
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return MissionsModel
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompetence(): string
    {
        return $this->competence;
    }

    /**
     * @param string $competence
     * @return MissionsModel
     */
    public function setCompetence(string $competence): self
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * @return string
     */
    public function getStartDate(): string
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     * @return MissionsModel
     */
    public function setStartDate(string $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getEndDate(): string
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     * @return MissionsModel
     */
    public function setEndDate(string $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getCodeName_Agent(): ?string
    {
        return $this->codeName_Agent;
    }

    /**
     * @param string $agent
     */
    public function setCodeName_Agent(string $agent): void
    {
        $this->codeName_Agent = $agent;

    }

    /**
     * @return string
     */
    public function getCodeName_Target(): ?string
    {
        return $this->codeName_Target;
    }

    /**
     * @param string $target
     */
    public function setCodeName_Target(string $target): void
    {
        $this->codeName_Target = $target;

    }

    /**
     * @return string
     */
    public function getCode_SafeHouse(): ?string
    {
        return $this->code_SafeHouse;
    }

    /**
     * @param string $safeHouse
     */
    public function setCode_SafeHouse(string $safeHouse): void
    {
        $this->code_SafeHouse = $safeHouse;
    }

    /**
     * @return string
     */
    public function getCodeName_Contact(): ?string
    {
        return $this->codeName_Contact;
    }

    /**
     * @param string $contact
     */
    public function setCodeName_Contact(string $contact): void
    {
        $this->codeName_Contact = $contact;
    }



}