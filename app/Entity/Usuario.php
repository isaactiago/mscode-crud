<?php 

namespace App\Entity;
use App\Database\Database;
use \PDO;

class Usuario
{

    private string $nome;
    private string $email;
    private string $senha;
   
    public function __construct()
    {
        //configurando o banco de dados
        $database = new Database(
            host:'localhost',
            database : 'Usuarios',
            username : 'root',
            password: 'mscode2024'
        );
        
        $this->pdo = $database->connection();
    }

    public function cadastar(): bool
    {
        try
        {
            $sql = "INSERT INTO {$campos}" ;
        }catch (\PDOExeption $e){

            echo "Erro ao inserir {$e->getMessage()}";
            return false;
        }
    }
}

?>