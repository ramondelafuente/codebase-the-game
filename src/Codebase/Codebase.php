<?php
declare(strict_types=1);

namespace Codebase;

final class Codebase
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
}
