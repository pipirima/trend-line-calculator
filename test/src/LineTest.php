<?php

namespace Pipirima\TrendLine\Test;

use PHPUnit\Framework\TestCase;
use Pipirima\TrendLine\Line;

class LineTest extends TestCase
{
    public function testAll()
    {
        $a = 13;
        $b = 17;
        $line = new Line($a, $b);
        $this->assertEquals($a, $line->getA());
        $this->assertEquals($b, $line->getB());
        $x = 8;
        $y = $a * $x + $b;
        $this->assertEquals($y, $line->getY($x));
    }
}
