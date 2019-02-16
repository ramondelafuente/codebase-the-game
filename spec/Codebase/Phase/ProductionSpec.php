<?php

namespace spec\Codebase\Phase;

use Codebase\Phase\Production;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Production::class);
    }
}
