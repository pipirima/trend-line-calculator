<?php

namespace Pipirima\TrendLine\Test;

use Pipirima\TrendLine\Calculator;
use PHPUnit\Framework\TestCase;
use Pipirima\TrendLine\NoDataException;
use Pipirima\TrendLine\Point;
use Pipirima\TrendLine\PointsCollection;

class CalculatorTest extends TestCase
{
    public function test1_should_throw_if_no_data_provided()
    {
        $this->expectException(NoDataException::class);
        $points = new PointsCollection();
        $calculator = new Calculator();
        $calculator->calculateLine($points);
    }

    public function test2_should_calculate_horizontal_line_for_one_point()
    {
        $point = new Point(100, 1000);
        $points = new PointsCollection();
        $points->addPoint($point);
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);
        $this->assertEquals(0, $line->getA());
        $this->assertEquals(1000, $line->getB());
    }

    public function test3_should_calculate_line_for_two_points()
    {
        $point1 = new Point(10, 10);
        $point2 = new Point(11, 11);
        $points = new PointsCollection();
        $points->addPointsArray([$point1, $point2]);
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);
        $this->assertEquals(1, $line->getA());
        $this->assertEquals(0, $line->getB());
    }

    public function test4_should_calculate_horizontal_line_for_two_horizontal_points()
    {
        $point1 = new Point(10, 10);
        $point2 = new Point(100, 10);
        $points = new PointsCollection();
        $points->addPointsArray([$point1, $point2]);
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);
        $this->assertEquals(0, $line->getA());
        $this->assertEquals(10, $line->getB());
    }

    public function test5_should_calculate_horizontal_line_for_two_vertical_points()
    {
        $point1 = new Point(10, 10);
        $point2 = new Point(10, 100);
        $points = new PointsCollection();
        $points->addPointsArray([$point1, $point2]);
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);
        $this->assertEquals(0, $line->getA());
        $this->assertEquals(55, $line->getB());
    }

    public function test6_general_example()
    {
        $point1 = new Point(10, 10);
        $point2 = new Point(20, 100);
        $point3 = new Point(30, 10);
        $points = new PointsCollection();
        $points->addPointsArray([$point1, $point2, $point3]);
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);
        $this->assertEquals(0, $line->getA());
        $this->assertEquals(40, $line->getB());
    }

    public function test7_general_example_found_in_internet()
    {
        // create points
        $point1 = new Point(1, 2);
        $point2 = new Point(2, 3);
        $point3 = new Point(3, 6);
        $point4 = new Point(4, 8);
        $point5 = new Point(5, 10);
        $point6 = new Point(6, 12);

        // create points collection
        $points = new PointsCollection();

        // add points to collection:

        // add single point object
        $points->addPoint($point1);

        // add array of point objects
        $points->addPointsArray([$point2, $point3]);

        // add single points coordinates (floats)
        $points->add($point4->getX(), $point4->getY());

        // add array of arrays
        $points->addArray([[$point5->getX(), $point5->getY()], [$point6->getX(), $point6->getY()]]);

        // calculate trend line
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);

        // check its coefficients
        $this->assertLessThan(0.0001, abs(2.0857 - $line->getA()));
        $this->assertLessThan(0.0001, abs(-0.46667 - $line->getB()));
    }
}
