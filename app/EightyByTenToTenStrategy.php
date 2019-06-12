<?php

namespace app;

use app\interfaces\DistributionStrategy;

class EightyByTenToTenStrategy implements DistributionStrategy
{

    public function calculateDistribution(): int
    {
        $result = mt_rand(1, 10);

        if ($result < 9) {
            return 0;
        } elseif ($result === 9) {
            return 1;
        } else {
            return 2;
        }
    }
}
