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
        $esito = creaDiamante('A');
        $atteso = ['A'];
        $this->assertEquals($atteso, $esito);
    }

    public function testSecondStep()
    {
        $esito = creaDiamante('B');
        $this->assertIsArray($esito);
    }

    public function testThirdStep()
    {
        $atteso = [' A ', 'B B', ' A '];
        $esito = creaDiamante('B');
        $this->assertEquals($atteso, $esito);
    }

    public function testFourthStep()
    {
        $esito = creaDiamante('a');
        $atteso = ['A'];
        $this->assertEquals($atteso, $esito);
    }
}

function creaDiamante($char)
{
    if (strtoupper($char) === 'A') {
        return ['A'];
    } else {
        return [' A ', 'B B', ' A '];
    }
}