<?php

use PHPUnit\Framework\TestCase;

require_once('Agua.php');

class AguaTest extends TestCase
{
    private $miAgua=null;
    public function setUp():void
    {
        $this->miAgua =new Agua();
    }
    public function testSolido():void
    {
        foreach (range (-273, 0) as $temperatura){
            $estado=$this->miAgua->getEstado($temperatura);
            $this->assertSame('Solido',$estado,"Temperatura $temperatura no es Solida");
        }
    } 
    public function testLiquida():void
    {
        foreach(range(1,99)as $temperatura){
            $estado=$this->miAgua->getEstado($temperatura);
            $this->assertSame('Liquido',$estado,"Temperatura $temperatura no es Liquido");
        }
    }
    public function testGaseoso():void
    {
        foreach (range(100,500)as $temperatura){
            $estado=$this->miAgua->getEstado($temperatura);
            $this->assertSame('Gaseoso',$estado,"Temperatura $temperatura no es Gaseoso");
        }
    }
    public function testTipoFloatOInt(): void
    {
        foreach (range(501,1000)as $temperatura){
        $estado=$this->miAgua->getEstado($temperatura);
        $this->assertSame('Gaseoso',$estado,"Temperatura $temperatura no es gaseoso");
    }
    }
}