<?php
/**
 *Author: Israel C A Silva
 *git: https://github.com/israelsilva1310
 *HomePage: https://israelcasilva.com.br
 **/

require_once('BuscaViaCEP_inc.php');

use Jarouche\ViaCEP\HelperViaCep;

$class_cep = HelperViaCep::getBuscaViaCEP('Querty', '01311300');
print_r($class_cep);