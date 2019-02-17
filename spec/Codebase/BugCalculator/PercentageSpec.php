<?php

namespace Codebase\BugCalculator;

use Codebase\Code;
use PhpSpec\ObjectBehavior;

class PercentageSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(100);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Percentage::class);
    }

    function it_calculates_for_zero_features(Code $codebase)
    {
        $codebase->featureCount()->willReturn(0);
        $this->calculate($codebase)->shouldReturn(0);
    }

    function it_calculates_for_one_feature(Code $codebase)
    {
        $codebase->featureCount()->willReturn(1);
        $this->calculate($codebase)->shouldReturn(1);
    }

    function it_calculates_for_more_features(Code $codebase)
    {
        $codebase->featureCount()->willReturn(3);
        $this->calculate($codebase)->shouldReturn(3);
    }

    function it_does_not_find_bugs_with_0_percent(Code $codebase)
    {
        $this->beConstructedWith(0);

        $codebase->featureCount()->willReturn(3);
        $this->calculate($codebase)->shouldReturn(0);
    }
}
