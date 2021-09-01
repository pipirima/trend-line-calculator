<?php

namespace Pipirima\TrendLine\Test;

use PHPUnit\Framework\TestCase;
use Pipirima\TrendLine\Point;
use Pipirima\TrendLine\PointsCollection;

class PointsCollectionTest extends TestCase
{
    public function testEmpty()
    {
        $this->assertEquals(0, count((new PointsCollection())->getPoints()));
    }

    public function testAddPoint()
    {
        $points = new PointsCollection();
        $points->addPoint(new Point(1, 2));
        $collection = $points->getPoints();
        $point = array_pop($collection);
        $this->assertEquals(1, $point->getX());
        $this->assertEquals(2, $point->getY());
    }

    public function testAddPointsArray()
    {
        $points = new PointsCollection();
        $points->addPointsArray([new Point(1, 2), new Point(3, 4)]);
        $points->addPointsArray([new Point(5, 6), new Point(7, 8)]);
        $collection = $points->getPoints();
        $this->assertEquals(4, count($collection));
        $point = array_pop($collection);
        $this->assertEquals(7, $point->getX());
        $this->assertEquals(8, $point->getY());
    }

    public function testAdd()
    {
        $points = new PointsCollection();
        $points->add(1, 2);
        $collection = $points->getPoints();
        $point = array_pop($collection);
        $this->assertEquals(1, $point->getX());
        $this->assertEquals(2, $point->getY());
    }

    public function testAddArray()
    {
        $points = new PointsCollection();
        $points->addArray([[1, 2], [3, 4], [5, 6], [7, 8]]);
        $collection = $points->getPoints();
        $this->assertEquals(4, count($collection));
        $point = array_pop($collection);
        $this->assertEquals(7, $point->getX());
        $this->assertEquals(8, $point->getY());
    }
}
