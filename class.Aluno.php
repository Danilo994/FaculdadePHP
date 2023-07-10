<?php
require_once("class.BancoDeDados.php");

class Aluno extends BancoDeDados
{
    public function listarAlunos()
    {
        $arrayAluno = $this->retornaArray("select * from aluno");

        return $arrayAluno;
    }

    public function listarAluno($idaluno)
    {
        $arrayAluno = $this->retornaArray("select * from aluno where idaluno=" . $idaluno);

        return $arrayAluno;
    }

    public function incluirAluno($nmaluno)
    {
        $arrayAluno = $this->retornando("insert into aluno(nmaluno) values ('$nmaluno')");

        return $arrayAluno;
    }

    public function alterarAluno($idaluno, $nmaluno)
    {
        $arrayAluno = $this->retornando("update aluno set nmaluno = '". $nmaluno. "' where idaluno =". $idaluno);

        return $arrayAluno;
    }

    public function excluirAluno($idaluno)
    {
        $arrayAluno = $this->retornando("delete from aluno where idaluno =" . $idaluno);

        return $arrayAluno;
    }

    public function listarAlunosNaoRelacionados($idaluno)
    {
        $arrayLogin = $this->retornaArray("select * from aluno a where a.idaluno not in (select l.idaluno from login l where l.idaluno = a.idaluno");

        return $arrayLogin;
    }
}

$aluno = new Aluno();

//dumpF($aluno->listarAlunos());
//dumpF($aluno->listarAluno(1));
