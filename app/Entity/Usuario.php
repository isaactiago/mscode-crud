<?php 

namespace App\Entity;
use App\Database\Database;
use \PDO;

class Usuario
{

    private PDO $pdo;
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

    public function cadastar(string $tabela, string $nome, string $email, string $senha): bool
    {
       
    }


    public function login(string $tabela,string $colunas,string $coluna1,string $coluna2,string $email, string $senha): bool
    {
        try
        {
         
               
                $senhaMD5 = md5($senha);
                $sql = "SELECT {$colunas} FROM {$tabela} WHERE {$coluna1} = :email AND {$coluna2} = :senha";

                $stmt = $this->pdo->prepare($sql);
                // Use bindParam para evitar injeção de SQL
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $senhaMD5);
                $stmt->execute();

                // Verifique se houve resultado
                if ($stmt->rowCount() > 0) {
                    // Obtenha os dados do usuário
                    $dado = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Inicie a sessão com o ID do usuário
                    $_SESSION['idusuario'] = $dado['email'];

                    return true;
                } else {
                    return false;
                }
        
            

        }catch (PDOExeption $e){

            echo "Erro na consulta {$e->getMessage()}";
            return false;
        }
        

       
    }
}

?>