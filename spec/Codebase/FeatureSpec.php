<?php

namespace Codebase;

use PhpSpec\ObjectBehavior;

class FeatureSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('write');

        $this->shouldHaveType(Feature::class);
        $this->codeCoverage()->shouldReturn(0);
        $this->bugCount()->shouldReturn(0);
    }
}
