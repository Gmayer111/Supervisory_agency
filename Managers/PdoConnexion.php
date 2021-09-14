<?php

namespace Managers;

use PDO;

class PdoConnexion
{

    public function pdo()
    {
        if (getenv('JAWSDB_URL') !== false) {
            $dbparts = parse_url(getenv('JAWSDB_URL'));

            $hostname = $dbparts['host'];
            $username = $dbparts['user'];
            $password = $dbparts['pass'];
            $database = ltrim($dbparts['path'],'/');

        }else {
            $username = 'root';
            $password = 'root';
            $database = 'intelligence_agency';
            $hostname = 'localhost';
        }
        $this->pdo(new PDO('mysql:dbname=$database;host=$hostname', $username, $password));
    }


}