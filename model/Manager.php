<?php
class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host= mozzapjben.mysql.db;dbname=mozzapjben;charset=utf8', 'mozzapjben', 'Casper777');
        return $db;
    }
}