<?php
require_once("class.BancoDeDados.php");

class Login extends BancoDeDados
{
    public function listarLogins()
    {
        $arrayLogin = $this->retornaArray("select * from login l left outer join aluno a on l.idaluno = a.idaluno");

        return $arrayLogin;
    }

    public function listarLogin($dslogin)
    {
        $arrayLogin = $this->retornaArray("select * from login where dslogin=" . $dslogin);

        return $arrayLogin;
    }

    public function listarAlunosNaoRelacionados()
    {
        $arrayLogin = $this->retornaArray("select * from aluno a where a.idaluno not in (select l.idaluno from login l where l.idaluno = a.idaluno)");

        return $arrayLogin;
    }

    public function incluirLogin($dslogin, $dssenha, $idaluno)
    {
        $arrayLogin = $this->retornando("insert into login(dslogin, dssenha, idaluno) values ('$dslogin', '$dssenha', '$idaluno')");

        return $arrayLogin;
    }

    public function alterarLogin($dslogin, $dssenha)
    {
        $arrayLogin = $this->retornando("update login set dssenha = '". $dssenha ."' where dslogin ='". $dslogin ."'");

        return $arrayLogin;
    }

    public function excluirLogin($dslogin)
    {
        $arrayLogin = $this->retornando("delete from login where dslogin ='" . $dslogin."'");

        return $arrayLogin;
    }
}

$login = new Login();