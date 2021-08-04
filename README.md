# trend-line-calculator
Calculation of trend line parameters for a given set of chart points.

## Usage

```injectablephp
        $point1 = new Point(1, 2);
        $point2 = new Point(2, 3);
        $point3 = new Point(3, 6);
        $point4 = new Point(4, 8);
        $point5 = new Point(5, 10);
        $point6 = new Point(6, 12);
        $pointsArray = [$point1, $point2, $point3, $point4, $point5, $point6];
        $points = new PointsCollection();
        $points->addPointsArray($pointsArray);
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);
        $this->assertLessThan(0.0001, abs(2.0857 - $line->getA()));
        $this->assertLessThan(0.0001, abs(-0.46667 - $line->getB()));
```
