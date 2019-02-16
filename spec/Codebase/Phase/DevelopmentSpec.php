<?php

namespace Codebase\Phase;

use Codebase\Phase;
use PhpSpec\ObjectBehavior;

class DevelopmentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('plan', [1, 2, 3]);

        $this->shouldHaveType(Development::class);
        $this->shouldImplement(Phase::class);

        $this->availableTime()->shouldReturn(1);
        $this->bugsToSolve()->shouldReturn(2);
        $this->coverageToIncrease()->shouldReturn(3);
    }
}
