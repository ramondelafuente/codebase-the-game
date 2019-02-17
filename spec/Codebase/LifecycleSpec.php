<?php

namespace Codebase;

use Codebase\BugCalculator\Percentage;
use Codebase\Phase\Development;
use Codebase\Phase\Production;
use PhpSpec\ObjectBehavior;

class LifecycleSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('begin');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Lifecycle::class);
        $this->iterations()->shouldReturn([]);
        $this->iterationCount()->shouldReturn(0);
    }

    function it_adds_an_iteration()
    {
        $iteration = Iteration::prepare(Development::plan(0,0,0), Production::plan(new Percentage(100)));
        $this->addIteration($iteration);
        $this->iterations()->shouldReturn([$iteration]);
        $this->iterationCount()->shouldReturn(1);
    }
}
