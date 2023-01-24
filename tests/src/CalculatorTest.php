<?php

namespace Pipirima\TrendLine\Test;

use Pipirima\TrendLine\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function test1_should_throw_if_no_data_provided()
    {
        $this->expectException(\Exception::class);
        $calculator = new Calculator();
        $calculator->calculateLine([]);
    }

    public function test2_should_calculate_horizontal_line_for_one_point()
    {
        $points = [
            [100, 1000]
        ];
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);
        $this->assertEquals(0, $line[0]);
        $this->assertEquals(1000, $line[1]);
    }

    public function test3_should_calculate_line_for_two_points()
    {
        $points = [
            [10, 10],
            [11, 11],
        ];
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);
        $this->assertEquals(1, $line[0]);
        $this->assertEquals(0, $line[1]);
    }

    public function test4_should_calculate_horizontal_line_for_two_horizontal_points()
    {
        $points = [
            [10, 10],
            [100, 10],
        ];
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);
        $this->assertEquals(0, $line[0]);
        $this->assertEquals(10, $line[1]);
    }

    public function test5_should_calculate_horizontal_line_for_two_vertical_points()
    {
        $points = [
            [10, 10],
            [10, 100],
        ];
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);
        $this->assertEquals(0, $line[0]);
        $this->assertEquals(55, $line[1]);
    }

    public function test6_general_example()
    {
        $points = [
            [10, 10],
            [20, 100],
            [30, 10],
        ];
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);
        $this->assertEquals(0, $line[0]);
        $this->assertEquals(40, $line[1]);
    }

    public function test7_general_example_found_in_internet()
    {
        // create points
        $points = [
            [1, 2],
            [2, 3],
            [3, 6],
            [4, 8],
            [5, 10],
            [6, 12],
        ];

        // calculate trend line
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);

        // check its coefficients
        $this->assertLessThan(0.0001, abs(2.0857 - $line[0]));
        $this->assertLessThan(0.0001, abs(-0.46667 - $line[1]));
    }
}
