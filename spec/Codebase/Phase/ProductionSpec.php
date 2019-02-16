<?php

namespace Codebase\Phase;

use Codebase\Code;
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

    function it_runs(Code $codebase)
    {
        $this->beConstructedThrough('plan');

        $this->run($codebase);
        $this->run($codebase)->shouldReturnAnInstanceOf(Code::class);
    }
}
