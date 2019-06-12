<?php

namespace app\interfaces;

interface DistributionStrategy
{
    public function calculateDistribution(): int;
}
