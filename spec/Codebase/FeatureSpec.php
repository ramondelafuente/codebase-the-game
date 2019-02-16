<?php

namespace Codebase;

use PhpSpec\ObjectBehavior;

class FeatureSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('write');

        $this->shouldHaveType(Feature::class);
        $this->coverage()->shouldReturn(0);
    }

    function it_does_not_allow_coverage_under_zero()
    {
        $this->beConstructedThrough('write', [-1]);
        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }

    function it_does_not_allow_coverage_over_one_hundred()
    {
        $this->beConstructedThrough('write', [101]);
        $this->shouldThrow(\InvalidArgumentException::class)->duringInstantiation();
    }
}
