<?php

namespace Models;

use Agent\AgentsModel;
use DateTime;
use SafeHouse\SafeHousesModel;
use Target\TargetsModel;

class MissionsModel
{
    private int $id;
    private string $title;
    private string $description;
    private string $country;
    private string $codeName;
    private AgentsModel $agent;
    private TargetsModel $target;
    private SafeHousesModel $safeHouse;
    private array $type;
    private array $state;
    private array $competence;
    private DateTime $startDate;
    private DateTime $endDate;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return MissionsModel
     */
    public function setId(int $id): self
    {
        $this->id = $id;

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
     * @return AgentsModel
     */
    public function getAgent(): AgentsModel
    {
        return $this->agent;
    }

    /**
     * @param AgentsModel $agent
     * @return MissionsModel
     */
    public function setAgent(AgentsModel $agent): self
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * @return TargetsModel
     */
    public function getTarget(): TargetsModel
    {
        return $this->target;
    }

    /**
     * @param TargetsModel $target
     * @return MissionsModel
     */
    public function setTarget(TargetsModel $target): self
    {
        $this->target = $target;

        return $this;
    }

    /**
     * @return SafeHousesModel
     */
    public function getSafeHouse(): SafeHousesModel
    {
        return $this->safeHouse;
    }

    /**
     * @param SafeHousesModel $safeHouse
     * @return MissionsModel
     */
    public function setSafeHouse(SafeHousesModel $safeHouse): self
    {
        $this->safeHouse = $safeHouse;

        return $this;
    }

    /**
     * @return array
     */
    public function getType(): array
    {
        return $this->type;
    }

    /**
     * @param array $type
     * @return MissionsModel
     */
    public function setType(array $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return array
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @param array $state
     * @return MissionsModel
     */
    public function setState(array $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return array
     */
    public function getCompetence(): array
    {
        return $this->competence;
    }

    /**
     * @param array $competence
     * @return MissionsModel
     */
    public function setCompetence(array $competence): self
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    /**
     * @param DateTime $startDate
     * @return MissionsModel
     */
    public function setStartDate(DateTime $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }

    /**
     * @param DateTime $endDate
     * @return MissionsModel
     */
    public function setEndDate(DateTime $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }



}