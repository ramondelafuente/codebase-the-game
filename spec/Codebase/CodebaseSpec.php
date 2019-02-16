<?php

namespace spec\Codebase;

use Codebase\Codebase;
use PhpSpec\ObjectBehavior;

class CodebaseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('initialize');

        $this->shouldHaveType(Codebase::class);
        $this->features()->shouldReturn([]);
    }
}
