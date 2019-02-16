<?php

namespace Codebase\Phase;

use PhpSpec\ObjectBehavior;

class ProductionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Production::class);
    }
}
