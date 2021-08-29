# trend-line-calculator
Calculation of trend line parameters for a given set of chart points.

## Usage

```php

use Pipirima\TrendLine\Point;
use Pipirima\TrendLine\PointsCollection;

use Pipirima\TrendLine\Calculator;

// ...

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
        $points->addArray([[$point5->getY(), $point5->getY()], [$point6->getY(), $point6->getY()]]);

        // calculate trend line
        $calculator = new Calculator();
        $line = $calculator->calculateLine($points);

        // check its coefficients
        $this->assertLessThan(0.0001, abs(2.0857 - $line->getA()));
        $this->assertLessThan(0.0001, abs(-0.46667 - $line->getB()));
```
