<?php
class TratamentoDeInput{
    
    private $caracteresIndesejaveis = array('"',"'",'<','>','--');

    protected function valorInvalido($informacao){
        if (empty(trim($informacao))) return true;

        foreach ($this->caracteresIndesejaveis as $caractere) {
            if (strpos($informacao, $caractere) !== false) {
                return true;
            } else {
                return false;
            }
        }
    }
}



$itemTeste = new TratamentoDeInput();
#var_dump($itemTeste->caracterInvalido('"'));