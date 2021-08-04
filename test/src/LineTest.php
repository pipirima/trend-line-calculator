<?php

namespace Pipirima\TrendLine\Test;

use PHPUnit\Framework\TestCase;
use Pipirima\TrendLine\Line;

class LineTest extends TestCase
{
    public function testAll()
    {
        $line = new Line(13, 17);
        $this->assertEquals(13, $line->getA());
        $this->assertEquals(17, $line->getB());
        $x = 8;
        $this->assertEquals(13 * $x + 17, $line->getY($x));
    }
}
