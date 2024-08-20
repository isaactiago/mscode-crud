<?php 

namespace App\Database;
use PDO;
use PDOExeption;


readonly class Database{
    //config do banco de dados

    private PDO $pdo;

    public function __construct(
        public string $host,
        public string $database,
        public string $username,
        public string $password,
    )
    {
        try 
        {

            $dsn = "mysql:host={$this->host};dbname={$this->database};charset=utf8;";

            $this->pdo = new PDO(

                dsn : $dsn,
                username : $this->username,
                password : $this->password
            );
    
        } catch (PDOExeption $e){

            echo "Erro na conexão {$e->getMessage()}";
            exit;
        }
    }

    public function connection(): PDO
    {
        return $this->pdo;
    }
    
}



?>