<?php
declare(strict_types=1);

namespace DiegoBrocanelli\Calcular;

/**
 * Classe responsável por realizar o cálculo do IMC.
 * 
 * @author Diego Brocanelli <diegod2@msn.com>
 */
class IMC
{
    /**
     * Responsável por realizar o cálculo do IMC
     *
     * @param float $altura
     * @param float $peso
     * @return string
     */
    public function calcular(float $altura, float $peso): string
    {
        $math = $peso / ($altura * $altura);
        
        $imc  = round($math, 2);
        
        return $this->analisarResultado($imc);
    }

    /**
     * Responsávle por verificar o resultado do cálculo do IMC.
     * Com isso retornando a string conforme resultado.
     *
     * @param float $imc
     * @return string
     */
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