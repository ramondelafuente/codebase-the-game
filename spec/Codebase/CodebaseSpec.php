<?php

namespace Codebase;

use PhpSpec\ObjectBehavior;

class CodebaseSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('initialize');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Codebase::class);
        $this->features()->shouldReturn([]);
        $this->featureCount()->shouldReturn(0);
        $this->bugCount()->shouldReturn(0);
    }

    function it_adds_a_feature()
    {
        $feature = Feature::write(0);

        $this->addFeature($feature);
        $this->features()->shouldReturn([$feature]);
        $this->featureCount()->shouldReturn(1);
    }

    function it_increases_the_bugcount()
    {
        $this->beConstructedThrough('initialize');

        $this->findBugs(3);
        $this->bugCount()->shouldReturn(3);
    }

    function it_reduces_the_bugcount()
    {
        $this->beConstructedThrough('initialize');
        $this->findBugs(3);

        $this->solveBugs(1);
        $this->bugCount()->shouldReturn(2);
    }


}
