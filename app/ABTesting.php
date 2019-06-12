<?php

namespace app;

use app\interfaces\DistributionStrategy;

class ABTesting
{
    protected $distributionStrategy;
    protected $variationData;

    public function __construct(DistributionStrategy $strategy, $variationData)
    {
        $this->distributionStrategy = $strategy;
        $this->variationData = $variationData;
    }

    public function run()
    {
        if (!CookieHelper::checkCookie("distribution")) {
            $key = $this->distributionStrategy->calculateDistribution();

            if (array_key_exists($key, $this->variationData)) {
                setcookie("distribution", $key);
                echo $this->variationData[$key];
            }

        } else {
            echo $this->variationData[$_COOKIE["distribution"]];
        }
    }
}
