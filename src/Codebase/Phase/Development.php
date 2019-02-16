<?php
declare(strict_types=1);

namespace Codebase\Phase;

use Codebase\Codebase;
use Codebase\Phase;

final class Development implements Phase
{
    /**
     * @var int
     */
    private $availableTime;

    /**
     * @var int
     */
    private $bugsToSolve;

    /**
     * @var int
     */
    private $coverageToIncrease;

    private function __construct()
    {
    }

    public static function plan(int $availableTime, int $bugsToSolve, int $coverageToIncrease): self
    {
        $development = new Development();
        $development->availableTime = $availableTime;
        $development->bugsToSolve = $bugsToSolve;
        $development->coverageToIncrease = $coverageToIncrease;

        return $development;
    }

    public function availableTime(): int
    {
        return $this->availableTime;
    }

    public function bugsToSolve(): int
    {
        return $this->bugsToSolve;
    }

    public function coverageToIncrease(): int
    {
        return $this->coverageToIncrease;
    }

    public function run(Codebase $codebase): Codebase
    {
        // TODO
        // 1. solve the requested number of bugs (or run out of time)
        // 2. increase the code coverage (or run out of time)
        // 3. work on new features for the remaining time
        //
        // return the codebase
    }
}
