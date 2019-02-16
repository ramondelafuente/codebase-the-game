<?php

namespace Codebase;

use Codebase\Iteration;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IterationSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Iteration::class);
    }
}
