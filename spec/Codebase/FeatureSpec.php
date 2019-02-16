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

    function it_is_initializable_with_coverage()
    {
        $this->beConstructedThrough('write', [7]);

        $this->shouldHaveType(Feature::class);
        $this->coverage()->shouldReturn(7);
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

    function it_can_increase_coverage()
    {
        $this->beConstructedThrough('write', [3]);
        $this->increaseCoverage(7);
        $this->coverage()->shouldReturn(10);
    }

    function it_increases_coverage_to_one_hundred()
    {
        $this->beConstructedThrough('write', [93]);
        $this->increaseCoverage(7);
        $this->coverage()->shouldReturn(100);
    }

    function it_does_not_increase_coverage_over_one_hundred()
    {
        $this->beConstructedThrough('write', [99]);
        $this->shouldThrow(\InvalidArgumentException::class)->during('increaseCoverage', [7]);
    }

}
