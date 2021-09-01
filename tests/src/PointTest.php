<?php

namespace Pipirima\TrendLine\Test;

use PHPUnit\Framework\TestCase;
use Pipirima\TrendLine\Point;

class PointTest extends TestCase
{
    public function testAll()
    {
        $point = new Point(13, 17);
        $this->assertEquals(13, $point->getX());
        $this->assertEquals(17, $point->getY());
    }
}
