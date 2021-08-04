<?php

namespace Pipirima\TrendLine;

class Line
{
    protected float $a;
    protected float $b;

    public function __construct(float $a, float $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function getA(): float
    {
        return $this->a;
    }

    public function getB(): float
    {
        return $this->b;
    }

    public function getY(float $x): float
    {
        return $this->a * $x + $this->b;
    }
}