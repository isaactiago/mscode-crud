<?php 

namespace App\Database;
use App\Database\Database;


class Query
{
    private \PDO $pdo;

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

     
    //select

    public function select(string $tabela,string $condicao = null, string $colunas = "*"): false|array
    {
        try
        {
            $sql = "SELECT {$colunas} FROM {$tabela}";

           

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
         
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        }catch (\PDOExeption $e){
            echo "Erro na consulta {$e->getMessage()}";
            return false;
        }
    }


    //insert
    public function insert(string $tabela, array $dados): false|int
    {
        try{

            //dados da query
            $campos = implode(',',array_keys($dados));
            $valores = implode(",", array_fill(0,count($dados), "?"));
            
            // Construir a consulta SQL
            $sql = "INSERT INTO {$tabela} ({$campos}) VALUES ({$valores})";

           
           
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array_values($dados));
            
        
            $id =  $this->pdo->lastInsertId();

            return $id;

        }catch (\PDOExeption $e)
        {
            echo "Erro ao inserir {$e->getMessage()}";
            return false;
        }
    }
 
}

?>