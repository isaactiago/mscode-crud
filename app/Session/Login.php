<?php 

namespace App\Session;

class Login
{
    //Metodo responsavel por verificar se o usuario esta logado
    public static function isLogado(): bool
    {
        return false;
    }

    //metodo responsavel por obriga o usuario a esta logado para acessar
    public static function requireLogin()
    {
        //se eu n estiver logado
        if(!self::isLogado())
        {
            header('location:index.html');
            exit;
        }
    }

     //metodo responsavel por obriga o usuario a esta deslogado para acessar
     public static function requireDeslogado()
     {
        //se eu n estiver logado
        if(self::isLogado())
        {
            header('location:index.html');
            exit;
        }
     }
}


?>