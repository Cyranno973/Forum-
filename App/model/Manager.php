<?php
namespace App\model;
use \PDO;

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=p5;charset=utf8', 'root', '');
        return $db;
    }
}
