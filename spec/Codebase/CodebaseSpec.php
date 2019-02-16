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
    }

    function it_adds_a_feature()
    {
        $this->beConstructedThrough('initialize');

        $feature = Feature::write(0);

        $this->addFeature($feature);
        $this->features()->shouldReturn([$feature]);
    }
}
