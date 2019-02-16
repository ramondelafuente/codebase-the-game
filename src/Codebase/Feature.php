<?php
declare(strict_types=1);

namespace Codebase;

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
        $feature = new Feature();
        $feature->coverage = $coverage;

        return $feature;
    }

    public function coverage(): int
    {
        return $this->coverage;
    }
}
