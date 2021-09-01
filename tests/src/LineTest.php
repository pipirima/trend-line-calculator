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
        $x = [8, 12];
        $expected_y = [121, 173];
        $this->assertEquals(121, $line->getY(8));
        $this->assertEquals($expected_y, array_map($line, $x));
    }
}
