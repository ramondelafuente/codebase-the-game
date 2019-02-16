<?php

namespace Codebase;

use PhpSpec\ObjectBehavior;

class TeamSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedThrough('form');

        $this->shouldHaveType(Team::class);
        $this->codebase()->shouldReturnAnInstanceOf(Code::class);
        $this->lifecycle()->shouldReturnAnInstanceOf(Lifecycle::class);
        $this->inspectCodebase()->shouldReturn(
            [
                'features' => 0,
                'bugs' => 0
            ]
        );
    }

    function it_plans_an_iteration()
    {
        $this->beConstructedThrough('form');

        $this->planIteration(0);
        $this->codebase()->features()->shouldNotBeEmpty();
        $this->lifecycle()->iterations()->shouldNotBeEmpty();
    }

    public function getMatchers(): array
    {
        return [
            'beEmpty' => function ($subject) {
                return empty($subject);
            },
        ];
    }
}
