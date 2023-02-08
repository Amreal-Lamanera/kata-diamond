<?php

use PHPUnit\Framework\TestCase;

class DiamondTest extends TestCase
{
    public function testAssertTrue()
    {
        $this->assertTrue(true);
    }

    public function testOneChar()
    {
        $esito = Diamond::creaDiamante('A');
        $atteso = ['A'];
        $this->assertEquals($atteso, $esito);
    }

    public function testSecondStep()
    {
        $esito = Diamond::creaDiamante('B');
        $this->assertIsArray($esito);
    }

    public function testThirdStep()
    {
        $atteso = [' A ', 'B B', ' A '];
        $esito = Diamond::creaDiamante('B');
        $this->assertEquals($atteso, $esito);
    }

    public function testFourthStep()
    {
        $esito = Diamond::creaDiamante('a');
        $atteso = ['A'];
        $this->assertEquals($atteso, $esito);
    }

    public function testFifthStep()
    {
        $atteso = ['  A  ', ' B B ', 'C   C', ' B B ', '  A  '];
        $esito = Diamond::creaDiamante('C');
        $this->assertEquals($atteso, $esito);
    }

    public function testSixthStep()
    {
        $atteso = ['   A   ', '  B B  ', ' C   C ', 'D     D', ' C   C ', '  B B  ', '   A   '];
        $esito = Diamond::creaDiamante('D');
        $this->assertEquals($atteso, $esito);
    }

    public function testException1()
    {
        $this->expectException(InvalidArgumentException::class);
        Diamond::creaDiamante('-');
    }

    public function testException2()
    {
        $this->expectException(InvalidArgumentException::class);
        Diamond::creaDiamante('asd');
    }
}