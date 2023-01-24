# trend-line-calculator
Calculation of trend line parameters for a given set of chart points.

## Usage

```php

use Pipirima\TrendLine\Calculator;

// ...

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
```
