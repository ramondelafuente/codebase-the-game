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
        return new self();
    }

    private function __construct()
    {
        $this->features = [];
        $this->bugCount = 0;
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
