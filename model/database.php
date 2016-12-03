<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=mysql.hostinger.co;dbname=u934060141_ms;charset=utf8','u934060141_root', 'anakarina13');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}