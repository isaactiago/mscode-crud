<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';


use App\Database\Query;

$query = new Query();

$dado = $query->select(
    tabela : 'usuario',
   

);



//fazer o insert primeiro
if(isset($_POST['nome'], $_POST['email'],$_POST['senha'])){
   
    $nome = $_POST['nome'];
    $email =  $_POST['email'];
    $senha = $_POST['senha'];

   
    $dados = [
        'nome' => $nome,
        'email' => $email,
        'senha' => $senha,
    ];

   $query->insert(
        tabela : 'usuario',
        dados : $dados,
       
   );

   echo "inseriu";
    
}; 

?>