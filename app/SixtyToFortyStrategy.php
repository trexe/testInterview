<?php

namespace app;

use app\interfaces\DistributionStrategy;

class SixtyToFortyStrategy implements DistributionStrategy
{

    public function calculateDistribution(): int
    {
        $result = mt_rand(1, 10);
        return $result < 7 ? 0 : 1;
    }
}
