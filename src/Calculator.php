<?php

namespace Pipirima\TrendLine;

class Calculator
{
    public function calculateLine(array $points): array
    {
        $cnt = count($points);
        if (0 === $cnt) {
            throw new \Exception('No data given');
        }
        $Xavg = 0;
        $Yavg = 0;
        foreach ($points as $point) {
            $Xavg += $point[0];
            $Yavg += $point[1];
        }
        $Xavg /= $cnt;
        $Yavg /= $cnt;

        $mCounter = 0;
        $mDenominator = 0;

        foreach ($points as $point) {
            $mCounter += ($point[0] - $Xavg) * ($point[1] - $Yavg);
            $mDenominator += ($point[0] - $Xavg) ** 2;
        }

        if (0 == $mDenominator) {
            return [0, $Yavg];
        }

        $m = $mCounter / $mDenominator;
        $b = $Yavg - $m * $Xavg;

        return [$m, $b];
    }
}
