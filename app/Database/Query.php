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




    //insert
    public function insert(string $tabela, array $dados): false|int
    {
        try{

            if (isset($dados['email'],) && isset($dados['senha'])) {
                $email = $dados['email'];
                $senha = $dados['senha'];
                $sqlVerifica = "SELECT COUNT(*) FROM {$tabela} WHERE email = :email AND senha = :senha";
                $stmtVerifica = $this->pdo->prepare($sqlVerifica);
                $stmtVerifica->bindParam(':email', $email);
                $stmtVerifica->bindParam(':senha', $senha);
                $stmtVerifica->execute();
    
                //$stmtVerifica->fetchColumn() > 0 verifica se o e-mail já existe no banco de dados.
                if ($stmtVerifica->fetchColumn() > 0) {
                    $_SESSION['error'] = "usuario ja cadastradio";
                    header('location:index.html');
                    exit;
                }
            }

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

     //insert
     public function update(string $tabela, array $dados,$condicao): bool
     {
        try{
          /*   UPDATE
            produtos
            SET
            descricao = 'Lápis preto (unid)'
            WHERE
            id = 2 */

            $sql = "UPDATE {$tabela} SET ";

        }catch (\PDOExeption $e)
        {
            echo "Erro ao editar {$e->getMessage()}";
            return false;
        }
     }
 
}

?>