<?php

require_once __DIR__.'/../vendor/autoload.php';

use DiegoBrocanelli\Calcular\IMC;

$template = file_get_contents(__DIR__.'/../template/formulario.html');

$request = filter_input(INPUT_SERVER, 'REQUEST_METHOD');

$result = '';
$peso   = '';
$altura = '';

if($request === 'POST'){
    $peso  = filter_input(INPUT_POST, 'peso');
    $altura = filter_input(INPUT_POST, 'altura');

    $imc = new IMC();
    $result = $imc->calcular($altura, $peso);
}

$resultado = 'a';

echo str_replace(
    ['{VALOR_PESO}', '{VALOR_ALTURA}', '{RESULTADO}'],
    [$peso, $altura, $result],
    $template
);