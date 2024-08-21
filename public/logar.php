<?php 

ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';
use App\Entity\Usuario;

$login = addslashes(($_POST['email']));
$senha = addslashes($_POST['senha']);

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha']))
{

    $usuario = new Usuario();


    $email = addslashes(($_POST['email']));
    $senha = addslashes($_POST['senha']);


    if(
        $usuario->login(
            tabela : "usuario",
            colunas: 'email,senha',
            coluna1: 'email',
            coluna2: 'senha',
            email : $email,
            senha: $senha,
        ) === true
    ){
        if(isset($_SESSION['idusuario'])){
            header('location:users.html');
            exit;
        }
       
    }else{
        header('location:index.html');
        exit;
    }
   

   
}else{
    header('location:index.html');
}

?>