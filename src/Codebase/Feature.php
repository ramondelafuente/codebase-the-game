<?php
declare(strict_types=1);

namespace Codebase;

use Webmozart\Assert\Assert;

final class Feature
{
    /**
     * @var int
     */
    private $coverage;

    private function __construct()
    {
    }

    public static function write(int $coverage = 0): self
    {
        Assert::greaterThanEq($coverage, 0, 'Coverage should be 0% or higher');
        Assert::lessThanEq($coverage, 100, 'Coverage should be 100% or lower');

        $feature = new Feature();
        $feature->coverage = $coverage;

        return $feature;
    }

    public function coverage(): int
    {
        return $this->coverage;
    }

    public function increaseCoverage(int $percentageIncrease): void
    {
        Assert::greaterThanEq($percentageIncrease, 0, 'Coverage increase should be 0% or higher');
        Assert::lessThanEq($this->coverage + $percentageIncrease, 100, 'Total coverage can not become higher than 100%');

        $this->coverage += $percentageIncrease;
    }
}
