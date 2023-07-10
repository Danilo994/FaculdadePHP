<?php
require_once('class.TratamentoDeInput.php');

class ValidacaoDeFormulario extends TratamentoDeInput{

    const _MAXNOME = 20;
    const _MINNOME = 4;

    const _MAXEMAIL = 300;
    const _MINEMAIL = 10;

    const _MAXSENHA = 32;
    const _MINSENHA = 5;

    public function validarNome($nome){
        if (parent::valorInvalido($nome)) return false;
        if (strlen($nome) > self::_MAXNOME) return false;
        if (strlen($nome) < self::_MINNOME) return false;
        if(empty($nome) == true) return false;
        

        return true;
    }

    public function validarEmail($email){
        if (parent::valorInvalido($email)) return false;
        if (strlen($email) > self::_MAXEMAIL) return false;
        if (strlen($email) < self::_MINEMAIL) return false;
        if(empty($email) == true) return false;
        if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) return false;
        
        
        return true;
    }

    public function validarSenha($senha){
        if (parent::valorInvalido($senha)) return false;
        if (strlen($senha) > self::_MAXSENHA) return false;
        if (strlen($senha) < self:: _MINSENHA) return false;
        if(empty($senha) == true) return false;

        return true;
    }
}


$validar = new ValidacaoDeFormulario();

// var_dump($validar->validarNome("João Neto")); 
// var_dump($validar->validarEmail("joao@email.com"));
// var_dump($validar->validarSenha("123456"));