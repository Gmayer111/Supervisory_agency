<?php

namespace Models;


class MissionsModel
{

    private string $codeName;
    private string $title;
    private string $description;
    private string $country;
    private string $type;
    private ?string $state = null;
    private string $competence;
    private string $startDate;
    private string $endDate;

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
     * @return MissionsModel
     */
    public function setCodeName(string $codeName): self
    {
        $this->codeName = $this->validDatas($codeName);

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
        $this->title = $this->validDatas($title);

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
        $this->description = $this->validDatas($description);

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
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
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
        $this->competence = $this->validDatas($competence);

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
}