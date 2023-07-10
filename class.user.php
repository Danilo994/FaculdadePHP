<?php
require_once("class.BancoDeDados.php");

class User extends BancoDeDados
{
    public function validarLogin($login, $senha)
    {
        $arrayUser = $this->retornaArray("select * from login l where l.dslogin = '$login' and l.dssenha = '$senha'");

        return $arrayUser;
    }

    public function revalidarLogin()
    {
        $token = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

        session_name($token);
        session_start();

        if (!isset($_SESSION["login"]) || !isset($_SESSION["senha"]) || !isset($_SESSION["token"])) {
            session_destroy();
            header("location:index.php?erro=SEMLOGIN");
        }
    
        if ($_SESSION["token"] != $token) {
            session_destroy();
            header("location:index.php?erro=INVASAO");
        }
    
        if (!$this->validarLogin($_SESSION["login"], $_SESSION["senha"])) {
            session_destroy();
            header("location:index.php?erro=LOGININVALIDO");
        }
    }
}

$user = new User();