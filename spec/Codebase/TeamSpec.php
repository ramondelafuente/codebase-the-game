<?php

namespace Codebase;

use PhpSpec\ObjectBehavior;

class TeamSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('form');

        $this->shouldHaveType(Team::class);
        $this->codebase()->shouldReturnAnInstanceOf(Code::class);
        $this->lifecycle()->shouldReturnAnInstanceOf(Lifecycle::class);
    }
}
