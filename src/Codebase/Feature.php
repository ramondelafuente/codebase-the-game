<?php
declare(strict_types=1);

namespace Codebase;

final class Feature
{
    /**
     * @var int
     */
    private $codeCoverage;

    private function __construct()
    {
    }

    public static function write(int $codeCoverage = 0): self
    {
        $feature = new Feature();
        $feature->codeCoverage = $codeCoverage;

        return $feature;
    }

    public function bugCount(): int
    {
        return 0;
    }

    public function codeCoverage(): int
    {
        return $this->codeCoverage;
    }
}
