<?php

namespace Pipirima\TrendLine\Test;

use Pipirima\TrendLine\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();
        $this->assertEquals(10, $calculator->add(5, 5));
    }
}
