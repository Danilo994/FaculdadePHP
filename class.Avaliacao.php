<?php
require_once("class.BancoDeDados.php");

class Avaliacao extends BancoDeDados
{
    public function listarAvaliacoes()
    {
        $arrayAvaliacao = $this->retornaArray("select * from avaliacao");

        return $arrayAvaliacao
    }

    public function listarAvaliacao($idavaliacao)
    {
        $arrayAvaliacao = $this->retornaArray("select * from avaliacao where idavaliacao=" . $idavaliacao);

        return $arrayAvaliacao;
    }

    public function incluirAvaliacao($idaluno, $idavaliacao, $nota)
    {
        $arrayAvaliacao = $this->retornando("insert into avaliacao(idaluno, iddisciplina, nota) values ('$idaluno', '$iddisciplina', '$nota')");

        return $arrayAvaliacao;
    }

    public function alterarAvaliacao($iddisciplina, $nota)
    {
        $arrayAvaliacao = $this->retornando("update disciplina set nota ='". $nota. "' where idavaliacao =". $idavaliacao);

        return $arrayAvaliacao;
    }

    public function excluirAluno($idavaliacao)
    {
        $arrayAvaliacao = $this->retornando("delete from avaliacao where idavaliacao =". $idavaliacao);

        return $arrayAvaliacao;
    }

}

$avaliacao = new Avaliacao();