<?php 
declare(strict_types=1);

use DiegoBrocanelli\Calcular\IMC;
use PHPUnit\Framework\TestCase;

/**
 * Diego Brocanelli <diegod2@msn.com>
 */
final class IMCTest extends TestCase
{
    const ALTURA = 1.73;

    protected $imc;

    public function setUp()
    {
        $this->imc = new IMC();
    }

    public function testCalcularIMCMuitoAbaixoDoPeso()
    {
        $this->assertEquals($this->imc->calcular(self::ALTURA, 20), 'Muito abaixo do peso.');
    }

    public function testCalcularIMCAbaixoDoPeso()
    {
        $this->assertEquals($this->imc->calcular(self::ALTURA, 54), 'Abaixo do peso.');
    }

    public function testCalcularIMCPesoNormal()
    {
        $this->assertEquals($this->imc->calcular(self::ALTURA, 73), 'Peso normal.');
    }

    public function testCalcularIMCAcimaDoPeso()
    {
        $this->assertEquals($this->imc->calcular(self::ALTURA, 77), 'Acima do peso.');
    }

    public function testCalcularIMCObesidade1()
    {
        $this->assertEquals($this->imc->calcular(self::ALTURA, 99), 'Obesidade I.');
    }

    public function testCalcularIMCObesidade2()
    {
        $this->assertEquals($this->imc->calcular(self::ALTURA, 110), 'Obesidade II (severa).');
    }

    public function testCalcularIMCObesidade3()
    {
        $this->assertEquals($this->imc->calcular(self::ALTURA, 200), 'Obesidade III (mórbida).');
    }
}
