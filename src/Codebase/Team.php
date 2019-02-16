<?php
declare(strict_types=1);

namespace Codebase;

use Codebase\BugCalculator\OneBugInEveryFeature;
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
    private $timeBudget = 100;

    private function __construct()
    {
    }

    public static function form(): Team
    {
        $team = new Team();
        $team->codebase = Codebase::initialize();
        $team->lifecycle = Lifecycle::begin($team->codebase);

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
                $this->timeBudget-$this->codebase->bugCount(),
                $bugsToSolve,
                0
            ),
            Production::plan(new OneBugInEveryFeature())
        );

        $iteration->run($this->codebase);
        $this->lifecycle->addIteration($iteration);
    }
}
