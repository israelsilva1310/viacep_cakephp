<?php
/**
 *Author: Israel C A Silva
 *git: https://github.com/israelsilva1310
 *HomePage: https://israelcasilva.com.br
 **/

namespace israelsilva1310\viacep_cakephp;

abstract class buscaViaCEP implements ViaCEPInterface
{
    /**
     * Constante que indica qual o endereço da requisição
     * @var string CEP_SITE
     */
    const CEP_SITE = 'https://viacep.com.br/ws/';

    /**
     *
     *Constante utilizada para dizer o sub-endereço da requisição
     *p.ex para a requisição https://viacep.com.br/ws/cep_a_buscar/querty/ o valor da variável será '/querty/'
     *Deve ser especificada nas classes filhas que formalmente farão a implementação do método de busca
     * @var string CEP_METHOD
     */
    const CEP_METHOD = '';

    /**
     * Armazena cep pré-formatado para busca p.ex 09190099
     * @var string $cep
     */
    protected $cep;
    /**
     *Armazena o retorno bruto da requisição
     * @var string $results_string
     */
    protected $results_string;

    /**
     * Método validaCEP
     * Método para a formatação e validação do cep a ser pesquisado
     * @param string $cep
     * @return void;
     * @throws Exception
     */
    protected function validaCEP($cep)
    {
        $formated_cep = preg_replace("/[^0-9]/", "", $cep);
        if (!preg_match('/^[0-9]{8}?$/', $formated_cep)) {
            throw new \Exception("CEP inválido");
        }
        $this->cep = $formated_cep;
    }

    /**
     * Método buscaInfoCEP
     * Método para fazer a requisição e alementar a propriedade results_string
     * @param string $cep
     * @return void;
     * @throws Exception
     */

    protected function buscaInfoCEP()
    {
        $this->results_string = file_get_contents(self::CEP_SITE . $this->cep . static::CEP_METHOD);
    }

    public function retornaConteudoRequisicao()
    {
        if ($this->results_string == "") {
            throw new \Exception('Não houve requisição através do método retornaCEP');
        }
        return $this->results_string;
    }

    public function retornaCEP($cep)
    {
    }
}