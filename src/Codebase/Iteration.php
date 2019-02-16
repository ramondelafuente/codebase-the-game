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

    public static function initialize(Phase $developmentPhase, Phase $productionPhase): self
    {
        $iteration = new Iteration();
        $iteration->developmentPhase = $developmentPhase;
        $iteration->productionPhase = $productionPhase;

        return $iteration;
    }

    private function __construct()
    {
    }
}
