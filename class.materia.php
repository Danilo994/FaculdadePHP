<?php 
require_once("class.BancoDeDados.php");

class Materia extends BancoDeDados
{
    public function listarMaterias()
    {
        $arrayMateria = $this->retornaArray("select * from disciplina");

        return $arrayMateria;
    }

    public function listarMateria($iddisciplina)
    {
        $arrayMateria = $this->retornaArray("select * from disciplina where iddisciplina =". $iddisciplina);

        return $arrayMateria;
    }

    public function incluirMateria($dsdisciplina)
    {
        $arrayMateria = $this->retornando("insert into disciplina(dsdisciplina) values ('$dsdisciplina')");

        return $arrayMateria;
    }

    public function alterarMateria($iddisciplina, $dsdisciplina)
    {
        $arrayMateria = $this->retornando("update disciplina set dsdisciplina = '". $dsdisciplina. "' where iddisciplina =". $iddisciplina);

        return $arrayMateria;
    }

    public function excluirMateria($iddisciplina)
    {
        $arrayMateria = $this->retornando("delete from disciplina where iddisciplina =". $iddisciplina);

        return $arrayMateria;
    }

    // public function listarMateriaNaoRelacionados($idaluno)
    // {
    //     $arrayLogin = $this->retornaArray("select * from aluno a where a.idaluno not in (select l.idaluno from login l where l.idaluno = a.idaluno");

    //     return $arrayLogin;
    // }
}

$materia = new Materia();