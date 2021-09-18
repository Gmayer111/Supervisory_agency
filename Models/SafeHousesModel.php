<?php


namespace Models;

class SafeHousesModel
{
    private string $code;
    private string $address;
    private string $country;
    private string $type;
    private ?string $sf_Mission = null;

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
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return SafeHousesModel
     */
    public function setCode(string $code): self
    {
        $this->code = $this->validDatas($code);

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return SafeHousesModel
     */
    public function setAddress(string $address): self
    {
        $this->address = $this->validDatas($address);

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
     * @return SafeHousesModel
     */
    public function setCountry(string $country): self
    {
        $this->country = $this->validDatas($country);

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
     * @return SafeHousesModel
     */
    public function setType(string $type): self
    {
        $this->type = $this->validDatas($type);

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSfMission(): ?string
    {
        return $this->sf_Mission;
    }

    /**
     * @param string|null $sf_Mission
     */
    public function setSfMission(?string $sf_Mission): void
    {
        $this->sf_Mission = $sf_Mission;
    }





}