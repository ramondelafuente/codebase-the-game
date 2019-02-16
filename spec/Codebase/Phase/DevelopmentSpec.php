<?php

namespace Codebase\Phase;

use Codebase\Code;
use Codebase\Phase;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DevelopmentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('plan', [1, 2, 3]);

        $this->shouldHaveType(Development::class);
        $this->shouldImplement(Phase::class);

        $this->availableTime()->shouldReturn(1);
        $this->bugsToSolve()->shouldReturn(2);
        $this->coverageToIncrease()->shouldReturn(3);
    }

    function it_runs(Code $codebase)
    {
        $this->beConstructedThrough('plan', [11, 1, 0]);

        $codebase->solveBugs(1)->shouldBeCalled();
        $codebase->addFeature(Argument::type(Feature::class))->shouldBeCalled();
        $this->run($codebase)->shouldReturnAnInstanceOf(Code::class);
    }
}
