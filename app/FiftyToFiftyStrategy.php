<?php

namespace app;

use app\interfaces\DistributionStrategy;

class FiftyToFiftyStrategy implements DistributionStrategy
{

    public function calculateDistribution(): int
    {
        return mt_rand(0, 1);
    }
}
