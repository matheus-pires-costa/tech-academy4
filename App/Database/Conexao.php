<<<<<<< HEAD
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
                // Ajuste as credenciais se o seu MySQL local tiver senha
                $host = 'localhost';
                $dbname = 'clinica_estetica';
                $user = 'root';
                $password = ''; 

                self::$instance = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8",
                    $user,
                    $password
                );
                
                // Habilita tratamento de erros do PDO
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão com o banco de dados: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
<<<<<<< HEAD
}
=======
<<<<<<< HEAD
}
=======
}
=======
>>>>>>> c274d19db61f7c75a44bdfdd38f569f1293d9ac5
>>>>>>> 09c0003d0e1d26b790e88d29855d74c4f3911090
>>>>>>> 99e99fdffd80b98205a9b361fc89cb04e96719e8
