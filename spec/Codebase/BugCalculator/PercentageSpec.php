<?php

namespace Codebase\BugCalculator;

use Codebase\Code;
use Codebase\Feature;
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
        $codebase->features()->willReturn([]);

        $this->calculate($codebase)->shouldReturn(0);
    }

    function it_calculates_for_one_feature(Code $codebase)
    {
        $codebase->features()->willReturn([Feature::write(0)]);

        $this->calculate($codebase)->shouldReturn(1);
    }

    function it_calculates_for_more_features(Code $codebase)
    {
        $codebase->features()->willReturn([Feature::write(0), Feature::write(0), Feature::write(0)]);

        $this->calculate($codebase)->shouldReturn(3);
    }

}
