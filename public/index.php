<?php
// Importo o componente de autoloading do composer.
require_once __DIR__.'/../vendor/autoload.php';

// Importo o componente para realizar o cálculo de IMC
use DiegoBrocanelli\Calcular\IMC;

// Pego todo o conteúdo do arquivo HTML
$template = file_get_contents(__DIR__.'/../template/formulario.html');

// Capturo a request
$request = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

// pré inserção de valores base nas variáveis
$result    = '';
$peso      = '';
$altura    = '';
$resultado = '';
// somente na request do tipo POST
if($request === 'POST'){
    // capturo o valor do peso
    $peso  = filter_input(INPUT_POST, 'peso');
    // capturo o valor da altura
    $altura = filter_input(INPUT_POST, 'altura');

    // instâncio o objeto IMC
    $imc = new IMC();
    // Realizo o cálculo
    $result = $imc->calcular($altura, $peso);
}

// responsável por renderizar o html.
echo str_replace(
    ['{VALOR_PESO}', '{VALOR_ALTURA}', '{RESULTADO}'],
    [$peso, $altura, $result],
    $template
);