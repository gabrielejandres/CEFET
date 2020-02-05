<?php
class Conexao
{
    public static function connect()
    {
        $pdo = new PDO('mysql:host=localhost; dbname=dbprojetohospital', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

}
