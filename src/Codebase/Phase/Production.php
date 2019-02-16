<?php
declare(strict_types=1);

namespace Codebase\Phase;

use Codebase\BugCalculator;
use Codebase\Code;
use Codebase\Phase;

final class Production implements Phase
{
    /**
     * @var BugCalculator
     */
    private $bugCalculator;

    private function __construct()
    {
    }

    public static function plan(BugCalculator $bugCalculator): self
    {
        $production = new Production();
        $production->bugCalculator = $bugCalculator;

        return $production;
    }

    public function run(Code $codebase): Code
    {
        $codebase->findBugs($this->bugCalculator->calculate($codebase));

        return $codebase;
    }
}
