<?php

namespace Codebase;

use PhpSpec\ObjectBehavior;

class TeamSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('form', [100]);
    }

    function it_is_initializable()
    {
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
