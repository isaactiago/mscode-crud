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
if(isset($_POST['nome'], $_POST['email'],$_POST['senha']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha'])){
   
    $nome = $_POST['nome'];
    $email =  $_POST['email'];
    $senha = $_POST['senha'];

    $senhaMD5 = md5($senha);

    $dados = [
        'nome' => $nome,
        'email' => $email,
        'senha' => $senhaMD5,
    ];

    if(
        $query->insert(
            tabela : 'usuario',
            dados : $dados,
           
       )
    ){
        header('location:index.html');
        exit;
    }
        

  

   
    
}else{
    header('location:index.html');
    exit;
}; 

?>