<?php

namespace Codebase\Phase;

use Codebase\BugCalculator\Percentage;
use Codebase\Code;
use Codebase\Phase;
use PhpSpec\ObjectBehavior;

class ProductionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('plan', [new Percentage(100)]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Production::class);
        $this->shouldImplement(Phase::class);
    }

    function it_runs(Code $codebase)
    {
        $codebase->features()->willReturn(['Feature1', 'Feature2']);
        $codebase->findBugs(2)->shouldBeCalled();

        $this->run($codebase);
        $this->run($codebase)->shouldReturnAnInstanceOf(Code::class);
    }
}
