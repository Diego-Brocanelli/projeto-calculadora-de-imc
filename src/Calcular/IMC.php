<?php
declare(strict_types=1);

namespace DiegoBrocanelli\Calcular;

//require_once __DIR__.'/../vendor/autoload.php';

class IMC
{
    public function calcular(float $altura, float $peso): string
    {
        $math = $peso / ($altura * $altura);
        
        $imc  = round($math, 2);
        
        return $this->analisarResultado($imc);
    }

    private function analisarResultado(float $imc)
    {
        if($imc <= 17){
            
            return 'Muito abaixo do peso.';

        }elseif($imc < 18.49){

            return 'Abaixo do peso.';

        }elseif($imc <= 24.99){

            return 'Peso normal.';
            
        }elseif($imc <= 29.99){

            return 'Acima do peso.';
            
        }elseif($imc <= 34.99){

            return 'Obesidade I.';
            
        }elseif($imc <= 39.99){

            return 'Obesidade II (severa).';
            
        }elseif($imc > 40){

            return 'Obesidade III (mórbida).';
            
        }
    }
}