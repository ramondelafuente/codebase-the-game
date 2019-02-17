<?php
declare(strict_types=1);

namespace Codebase;

use Codebase\BugCalculator\Percentage;
use Codebase\Phase\Development;
use Codebase\Phase\Production;

final class Team
{
    /**
     * @var Code
     */
    private $codebase;

    /**
     * @var Lifecycle
     */
    private $lifecycle;

    /**
     * @var int
     */
    private $capacity;

    private function __construct()
    {
    }

    public static function form(int $capacity): Team
    {
        $team = new Team();
        $team->codebase = Codebase::initialize();
        $team->lifecycle = Lifecycle::begin($team->codebase);
        $team->capacity = $capacity;

        return $team;
    }

    public function codebase(): Code
    {
        return $this->codebase;
    }

    public function lifecycle(): Lifecycle
    {
        return $this->lifecycle;
    }

    public function inspectCodebase(): array
    {
        return [
            'features' => count($this->codebase->features()),
            'bugs' => $this->codebase->bugCount()
        ];
    }

    public function planIteration(int $bugsToSolve): void
    {
        $iteration = Iteration::prepare(
            Development::plan(
                $this->capacity - $this->codebase->bugCount(),
                $bugsToSolve,
                0
            ),
            Production::plan(new Percentage(10))
        );

        $iteration->run($this->codebase);
        $this->lifecycle->addIteration($iteration);
    }
}
