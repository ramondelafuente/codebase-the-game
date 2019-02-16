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
     * @var Codebase
     */
    private $codebase;

    private function __construct()
    {
    }

    public static function plan(Codebase $codebase, int $availableTime, int $bugsToSolve): self
    {
        $development = new Development();
        $development->codebase = $codebase;
        $development->availableTime = $availableTime;
        $development->bugsToSolve = $bugsToSolve;

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

    public function run(): Codebase
    {
        // TODO: Implement run() method.
    }
}
