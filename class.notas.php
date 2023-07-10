<?php 
require_once("class.BancoDeDados.php");

class Avaliacao extends BancoDeDados
{
    public function listarAvaliacoes()
    {
        $arrayAvaliacao = $this->retornaArray("select * from avaliacao a inner join aluno al on a.idaluno = al.idaluno inner join disciplina d on a.iddisciplina = d.iddisciplina");

        return $arrayAvaliacao;
    }

    public function listarAvaliacao($idavaliacao)
    {
        $arrayAvaliacao = $this->retornaArray("select * from avaliacao where idavaliacao =". $idavaliacao);

        return $arrayAvaliacao;
    }

    public function incluirAvaliacao($idaluno, $iddisciplina, $nota)
    {
        $arrayAvaliacao = $this->retornando("insert into avaliacao(idaluno, iddisciplina, nota) values ($idaluno, $iddisciplina, $nota)");

        return $arrayAvaliacao;
    }

    public function alterarAvaliacao($idavaliacao, $nota)
    {
        $arrayAvaliacao = $this->retornando("update avaliacao set nota = '". $nota. "' where idavaliacao =". $idavaliacao);

        return $arrayAvaliacao;
    }

    public function excluirAvaliacao($idavaliacao)
    {
        $arrayAvaliacao = $this->retornando("delete from avaliacao where idavaliacao =". $idavaliacao);

        return $arrayAvaliacao;
    }
}

$prova = new Avaliacao();