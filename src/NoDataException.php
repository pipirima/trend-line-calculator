<?php

namespace Pipirima\TrendLine;

class NoDataException extends \Exception
{
    const MESSAGE = 'Trend line calculations requires at least one point';

    public function __construct()
    {
        parent::__construct(self::MESSAGE);
    }
}
