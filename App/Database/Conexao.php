<?php

namespace App\Database;

use PDO;
use PDOException;

class Conexao
{
    private static $instance = null;

    public static function getConnection()
    {
        if (self::$instance === null) {
            try {

                $host = 'localhost';
                $dbname = 'clinica_estetica';
                $user = 'root';
                $password = 'Matheuszk@123'; 

                self::$instance = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8",
                    $user,
                    $password
                );
                

                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão com o banco de dados: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}