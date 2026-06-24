<?php

namespace App\Database;

use PDO;
use PDOException;

class Conexao
{
    private static $instancia;

    public static function getConnection()
    {

        try {
            $host = "sql210.infinityfree.com";
            $dbname = "if0_41731577_clinica_estetica";
            $usuario = "if0_41731577";
            $senha = "Matheus2099";

            self::$instancia = new PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8",
                $usuario,
                $senha
            );

            self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
        if (!isset(self::$instancia)) {
            try {
                self::$instancia = new PDO(
                    "mysql:host=localhost;dbname=clinica_estetica;charset=utf8",
                    "root",
                    ""
                );
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }
        return self::$instancia;
    }
}
