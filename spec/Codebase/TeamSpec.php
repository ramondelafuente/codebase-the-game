<?php

namespace Codebase;

use PhpSpec\Exception\Example\SkippingException;
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

    /**
     * @throws SkippingException
     */
    function it_plans_an_iteration()
    {
        $this->beConstructedThrough('form');

        throw new SkippingException(
            'Fix this test after development phases starts adding features'
        );

        $this->planIteration(0);
        $this->codebase()->features()->shouldNotBeEmpty();

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
