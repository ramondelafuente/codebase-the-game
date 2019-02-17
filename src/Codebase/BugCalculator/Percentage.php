<?php
declare(strict_types=1);

namespace Codebase\BugCalculator;

use Codebase\BugCalculator;
use Codebase\Code;

final class Percentage implements BugCalculator
{
    /**
     * @var int
     */
    private $percentage;

    public function __construct(int $percentage)
    {
        $this->percentage = $percentage;
    }

    public function calculate(Code $codebase): int
    {
        $numberOfFeatures = count($codebase->features());

        $bugCount = 0;
        for ($i = 1; $i <= $numberOfFeatures; $i++) {
            $bugCount += rand(1, 100) <= $this->percentage ? 1 : 0;
        }

        return $bugCount;
    }
}
