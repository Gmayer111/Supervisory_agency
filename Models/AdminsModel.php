<?php

namespace Models;


class AdminsModel
{

    private int $id;
    private string $firstname;
    private string $lastname;
    private string $password;
    private string $codeName;//login VARCHAR(entre 20 et 50)NOT NULL UNIQUE

    public function __construct(array $data = null)
    {
        if ($data) {
            $this->hydrate($data);
        }else {
            null;
        }
    }


    public function hydrate(array $data = null): void
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
     * @return AdminsModel
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
     * @return AdminsModel
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $this->validDatas($lastname);

        return $this;
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
     * @return AdminsModel
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

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
     * @return AdminsModel
     */
    public function setCodeName(string $codeName): self
    {
        $this->codeName = $codeName;

        return $this;
    }



}