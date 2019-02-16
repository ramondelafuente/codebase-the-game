<?php
declare(strict_types=1);

namespace Codebase\BugCalculator;

use Codebase\BugCalculator;
use Codebase\Code;

class OneBugInEveryFeature implements BugCalculator
{
    public function calculate(Code $codebase): int
    {
        return count($codebase->features());
    }
}
