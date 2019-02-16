<?php

namespace spec\Codebase\Phase;

use Codebase\Phase\Development;
use PhpSpec\ObjectBehavior;

class DevelopmentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('start', [5, 1]);

        $this->shouldHaveType(Development::class);
        $this->availableTime()->shouldReturn(5);
        $this->bugsToSolve()->shouldReturn(1);
    }
}
