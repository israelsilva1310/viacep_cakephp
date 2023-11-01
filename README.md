Instalação do Pacote
composer require israelsilva1310/Viacep_cakephp
Configuração

1) Cakephp
   Se você utiliza o Framework CakePHP segue logo abaixo as confgurações após a instalação.

Entre na pasta app/config no arquivo app.php.

No arquivo procure o array providers

Entre com o provider no final da lista como exemplo:

'providers' => [
...
Canducci\Cep\Providers\CepServiceProvider::class
]
Dentro do mesmo arquivo (app.php) configure os apelidos (Facades) como exemplo:

'aliases' => [
...
'Cep' => Canducci\Cep\Facades\Cep::class,
'Endereco' => Canducci\Cep\Facades\Endereco::class
]
Como utilizar?

6.2 - Dados informados errados

6.2.1 - No Cep o valor informado deve possuir um desses formatos:

01010000, ou
01010-000
para uma resposta satisfatória, se não um exceção será lançada.

6.2.2 - No Endereco os valores informados segue essas regras

Uf com 2 letras
Cidade com no minimo 3 letras
Logradouro com no minimo 3 letras
se não uma exceção será lançada.

2) Qualquer código que usa o composer.phar:
   λ php composer.phar require israelsilva1310/Viacep_cakephp
   logo após isso, inclua no seu código o autoload.php que está dentro da pasta vendor, exemplo:

<?php

  require_once 'vendor/autoload.php';

  $cepResponse = cep('01010000');
  $data = $cepResponse->getCepModel();
  echo