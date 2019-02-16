<?php

namespace Codebase\Phase;

use Codebase\Codebase;
use Codebase\Phase;
use PhpSpec\ObjectBehavior;

class ProductionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('plan', [Codebase::initialize()]);

        $this->shouldHaveType(Production::class);
        $this->shouldImplement(Phase::class);
    }
}
