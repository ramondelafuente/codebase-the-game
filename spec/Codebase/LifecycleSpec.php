<?php

namespace Codebase;

use Codebase\Phase\Development;
use Codebase\Phase\Production;
use PhpSpec\ObjectBehavior;

class LifecycleSpec extends ObjectBehavior
{
    function let(Code $codebase)
    {
        $this->beConstructedThrough('begin', [$codebase]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Lifecycle::class);
        $this->codebase()->shouldReturnAnInstanceOf(Code::class);
        $this->iterations()->shouldReturn([]);
    }

    function it_adds_an_iteration()
    {
        $iteration = Iteration::prepare(Development::plan(0,0,0), Production::plan());
        $this->addIteration($iteration);
        $this->iterations()->shouldReturn([$iteration]);
    }
}
