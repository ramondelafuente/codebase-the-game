<?php
declare(strict_types=1);

namespace Codebase;

final class Codebase
{
    /**
     * @var array
     */
    private $features;

    public static function initialize(): self
    {
        return new self();
    }

    private function __construct()
    {
        $this->features = [];
    }

    public function features(): array
    {
        return $this->features;
    }

    public function addFeature(Feature $feature): void
    {
        $this->features[] = $feature;
    }
}
