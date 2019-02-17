<?php
declare(strict_types=1);

namespace Codebase;

use Webmozart\Assert\Assert;

final class Codebase implements Code
{
    /**
     * @var Feature[]
     */
    private $features;

    /**
     * @var int
     */
    private $bugCount;

    public static function initialize(): self
    {
        return new self([], 0);
    }

    private function __construct(array $features, int $bugCount)
    {
        $this->features = $features;
        $this->bugCount = $bugCount;
    }

    /**
     * @return Feature[]
     */
    public function features(): array
    {
        return $this->features;
    }

    public function addFeature(Feature $feature): void
    {
        $this->features[] = $feature;
    }

    public function bugCount(): int
    {
        return $this->bugCount;
    }

    public function featureCount(): int
    {
        return count($this->features);
    }

    public function findBugs(int $numberOfBugs): void
    {
        Assert::greaterThanEq($numberOfBugs, 0, 'The number of bugs found should be 0 or more');

        $this->bugCount += $numberOfBugs;
    }

    public function solveBugs(int $numberOfBugs): void
    {
        Assert::greaterThanEq($numberOfBugs, 0, 'The number of bugs solved should be 0 or more');
        Assert::greaterThanEq($this->bugCount, $numberOfBugs, 'The unmber of bugs solved can not be greater than known bugs');

        $this->bugCount -= $numberOfBugs;
    }
}
