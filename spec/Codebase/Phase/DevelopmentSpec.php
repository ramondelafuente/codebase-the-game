<?php

namespace Codebase\Phase;

use Codebase\Codebase;
use PhpSpec\ObjectBehavior;

class DevelopmentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('start', [Codebase::initialize(), 5, 1]);

        $this->shouldHaveType(Development::class);
        $this->availableTime()->shouldReturn(5);
        $this->bugsToSolve()->shouldReturn(1);
    }
}
