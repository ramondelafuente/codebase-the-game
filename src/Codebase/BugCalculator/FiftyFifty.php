<?php
declare(strict_types=1);

namespace Codebase\BugCalculator;

use Codebase\BugCalculator;
use Codebase\Code;

class FiftyFifty implements BugCalculator
{
    public function calculate(Code $codebase): int
    {
        $bugCount = 0;
        foreach ($codebase->features() as $feature) {
            $bugCount += rand(0,1);
        }

        return $bugCount;
    }
}
