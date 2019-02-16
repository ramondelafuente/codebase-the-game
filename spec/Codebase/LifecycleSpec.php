<?php

namespace Codebase;

use Codebase\Phase\Development;
use Codebase\Phase\Production;
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

    function it_adds_an_iteration()
    {
        $this->beConstructedThrough('initialize');

        $iteration = Iteration::prepare(Development::plan(0,0,0), Production::plan());
        $this->addIteration($iteration);
        $this->iterations()->shouldReturn([$iteration]);
    }
}
