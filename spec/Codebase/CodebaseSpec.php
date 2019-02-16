<?php

namespace Codebase;

use PhpSpec\ObjectBehavior;

class CodebaseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('initialize');

        $this->shouldHaveType(Codebase::class);
        $this->features()->shouldReturn([]);
        $this->bugCount()->shouldReturn(0);
    }

    function it_adds_a_feature()
    {
        $this->beConstructedThrough('initialize');

        $feature = Feature::write(0);

        $this->addFeature($feature);
        $this->features()->shouldReturn([$feature]);
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
