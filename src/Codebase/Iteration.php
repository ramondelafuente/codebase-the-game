<?php
declare(strict_types=1);

namespace Codebase;

final class Iteration
{
    /**
     * @var Phase
     */
    private $developmentPhase;

    /**
     * @var Phase
     */
    private $productionPhase;

    public static function prepare(Phase $developmentPhase, Phase $productionPhase): self
    {
        $iteration = new Iteration();
        $iteration->developmentPhase = $developmentPhase;
        $iteration->productionPhase = $productionPhase;

        return $iteration;
    }

    private function __construct()
    {
    }

    public function run(Code $codebase): void
    {
        $this->developmentPhase->run($codebase);
        $this->productionPhase->run($codebase);
    }
}
