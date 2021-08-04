<?php

namespace Pipirima\TrendLine\Test;

use Pipirima\TrendLine\Calculator;
use PHPUnit\Framework\TestCase;
use Pipirima\TrendLine\Point;
use Pipirima\TrendLine\PointsCollection;

class CalculatorTest extends TestCase
{
    public function testTwoPoints()
    {
        $point1 = new Point(0, 0);
        $point2 = new Point(1, 1);
        $points = new PointsCollection();
        $points->addPointsArray([$point1, $point2]);
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);
        $this->assertEquals(1, $line->getA());
        $this->assertEquals(0, $line->getB());
    }
}
