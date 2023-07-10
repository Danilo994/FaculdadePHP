<?php
require_once("class.tratamentodeinput.php");

class ValidacoesDeFormulario extends TratamentoDeInput{
    
    const _TAMANHOMAXNOME = 20;
    const _TAMANHOMINNOME = 10;

    public function validarNome($nome){
        if ($this->valorInvalido($nome)) return false;
        if (strlen($nome) < self::_TAMANHOMINNOME || strlen($nome) > self::_TAMANHOMAXNOME) return false;

        return true;
    }
}

$validarInformacao = new ValidacoesDeFormulario();
//var_dump($validarInformacao->validarNome('"'));
//var_dump($validarInformacao->validarNome('    '));
var_dump($validarInformacao->validarNome('0123456789'));