<?php

namespace Codebase\Phase;

final class Development
{
    /**
     * @var int
     */
    private $availableTime;

    /**
     * @var int
     */
    private $bugsToSolve;

    private function __construct()
    {
    }

    public static function start(int $availableTime, int $bugsToSolve): self
    {
        $instance = new Development();
        $instance->availableTime = $availableTime;
        $instance->bugsToSolve = $bugsToSolve;

        return $instance;
    }

    public function availableTime(): int
    {
        return $this->availableTime;
    }

    public function bugsToSolve(): int
    {
        return $this->bugsToSolve;
    }
}
