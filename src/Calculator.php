<?php

namespace Pipirima\TrendLine;

class Calculator
{
    public function calculateLine(PointsCollection $collection): Line
    {
        $points = $collection->getPoints();
        $cnt = count($points);
        if (0 === $cnt) {
            throw new NoDataException();
        }
        $Xavg = 0;
        $Yavg = 0;
        /** @var Point $point */
        foreach ($points as $point) {
            $Xavg += $point->getX();
            $Yavg += $point->getY();
        }
        $Xavg /= $cnt;
        $Yavg /= $cnt;

        $mCounter = 0;
        $mDenominator = 0;

        /** @var Point $point */
        foreach ($points as $point) {
            $mCounter += ($point->getX() - $Xavg) * ($point->getY() - $Yavg);
            $mDenominator += ($point->getX() - $Xavg) ** 2;
        }

        if (0 == $mDenominator) {
            return new Line(0, $Yavg);
        }

        $m = $mCounter / $mDenominator;
        $b = $Yavg - $m * $Xavg;

        return new Line($m, $b);
    }
}
