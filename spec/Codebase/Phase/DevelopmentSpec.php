<?php

namespace Codebase\Phase;

use Codebase\Codebase;
use Codebase\Phase;
use PhpSpec\ObjectBehavior;

class DevelopmentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('plan', [Codebase::initialize(), 5, 1]);

        $this->shouldHaveType(Development::class);
        $this->shouldImplement(Phase::class);

        $this->availableTime()->shouldReturn(5);
        $this->bugsToSolve()->shouldReturn(1);
    }
}
