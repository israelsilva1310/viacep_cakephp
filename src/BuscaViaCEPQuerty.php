<?php
/**
 *Author: Israel C A Silva
 *git: https://github.com/israelsilva1310
 *HomePage: https://israelcasilva.com.br
 **/

namespace israelsilva1310\viacep_cakephp;

class BuscaViaCEPQuerty extends BuscaViaCEP
{
    const CEP_METHOD = '/querty/';

    /**
     * Método retornaCEP
     * Método para o retorno dos dados do CEP pesquisado
     * @param string $cep
     * @return Array Array com os dados do CEP pesquisado, caso não exista irá retornar um array ('erro' => true);
     */

    public function retornaCEP($cep)
    {
        $results = '';
        $this->validaCEP($cep);
        $this->buscaInfoCEP();
        parse_str($this->results_string, $results);
        return $results;
    }
}