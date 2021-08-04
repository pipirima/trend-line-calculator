<?php

namespace Pipirima\TrendLine;

class PointsCollection
{
    protected array $collection;

    public function __construct()
    {
        $this->clear();
    }

    public function clear()
    {
        $this->collection = [];
    }

    public function addPoint(Point $point)
    {
        $this->collection[] = $point;
    }

    public function addPointsArray(array $points)
    {
        foreach ($points as $point) {
            $this->addPoint($point);
        }
    }

    public function add(float $x, float $y)
    {
        $this->addPoint(new Point($x, $y));
    }

    public function addArray(array $items)
    {
        foreach ($items as $item) {
            list($x, $y) = $item;
            $this->add($x, $y);
        }
    }

    public function getPoints(): array
    {
        return $this->collection;
    }
}
