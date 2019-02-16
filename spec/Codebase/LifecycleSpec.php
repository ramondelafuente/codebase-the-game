<?php

namespace Codebase;

use PhpSpec\ObjectBehavior;

class LifecycleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('initialize');
        $this->shouldHaveType(Lifecycle::class);
        $this->codebase()->shouldReturnAnInstanceOf(Code::class);
        $this->iterations()->shouldReturn([]);
    }
}
