<?php

namespace Models;


class ConnectModel
{

    public function connect()
    {
        $pdo = new PDO('mysql:dbname=intelligence_agency;host=localhost', 'root', 'root');
    }



}