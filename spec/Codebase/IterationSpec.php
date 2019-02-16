<?php

namespace Codebase;

use PhpSpec\ObjectBehavior;

class IterationSpec extends ObjectBehavior
{
    function it_is_initializable(Phase $developmentPhase, Phase $productionPhase)
    {
        $this->beConstructedThrough('prepare', [$developmentPhase, $productionPhase]);
        $this->shouldHaveType(Iteration::class);
    }

    function it_runs(Phase $developmentPhase, Phase $productionPhase, Code $codebase)
    {
        $this->beConstructedThrough('prepare', [$developmentPhase, $productionPhase]);

        $developmentPhase->run($codebase)->shouldBeCalled();
        $productionPhase->run($codebase)->shouldBeCalled();
        $this->run($codebase);
    }
}
