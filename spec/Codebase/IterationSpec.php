<?php

namespace Codebase;

use PhpSpec\ObjectBehavior;

class IterationSpec extends ObjectBehavior
{
    function it_is_initializable(Phase $developmentPhase, Phase $productionPhase)
    {
        $this->beConstructedThrough('initialize', [$developmentPhase, $productionPhase]);
        $this->shouldHaveType(Iteration::class);
    }
}
