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

    public function testFifthStep()
    {
        $atteso = ['  A  ', ' B  B ', 'C    C', ' B  B ', '  A  '];
        $esito = creaDiamante('C');
        $this->assertEquals($atteso, $esito);
    }

    public function testSixthStep()
    {
        $atteso = ['   A   ', '  B  B  ', ' C    C ', 'D      D', ' C    C ', '  B  B  ', '   A   '];
        $esito = creaDiamante('D');
        $this->assertEquals($atteso, $esito);
    }
}

function creaDiamante($char)
{
    if (strtoupper($char) === 'A') {
        return ['A'];
    } elseif (strtoupper($char) === 'B') {
        return [' A ', 'B B', ' A '];
    }
    else {
        $chars = range('A', $char);
        $result = array();
        for ($i = 0; $i < count($chars); $i++) {
            $el = '';
            for ($j = 0; $j < count($chars)-1-$i; $j++) {
                $el .= ' ';
            }
            $temp = '';
            for ($j = 0; $j < $i; $j++) {
                $temp .= ' ';
            }
            if (!$i) {
                $temp = $el;
                $el .= $chars[$i] . $temp;
            }
            else {
                $el .= $chars[$i] . $temp;
                $revEl = strrev($el);
                $el .= $revEl;
            }
            $result[] = $el;
        }
        $revResult = array_reverse($result);
        array_shift($revResult);
        foreach ($revResult as $value) {
            $result[] = $value;
        }
        return $result;
    }
}