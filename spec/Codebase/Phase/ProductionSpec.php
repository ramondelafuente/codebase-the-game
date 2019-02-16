<?php

namespace Codebase\Phase;

use Codebase\Phase;
use PhpSpec\ObjectBehavior;

class ProductionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('plan');

        $this->shouldHaveType(Production::class);
        $this->shouldImplement(Phase::class);
    }
}
