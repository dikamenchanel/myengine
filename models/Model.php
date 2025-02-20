<?php

namespace models;

use lib\DataBase;

class Model
{
    public $db;

    function __construct()
    {
        $this->db = new DataBase();
    }
}
