<?php

namespace Models;


class LoginModel
{

        private string $codeName;
        private string $password;

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
    public function setCodeName(string $codeName): void
    {
        $this->codeName = $codeName;
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
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }



}