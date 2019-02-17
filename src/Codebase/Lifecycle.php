<?php
declare(strict_types=1);

namespace Codebase;

final class Lifecycle
{
    /**
     * @var Iteration[]
     */
    private $iterations;

    private function __construct()
    {
    }

    public static function begin(): self
    {
        $lifecycle = new Lifecycle();
        $lifecycle->iterations = [];

        return $lifecycle;
    }

    public function iterations(): array
    {
        return $this->iterations;
    }

    public function iterationCount(): int
    {
        return count($this->iterations);
    }

    public function addIteration(Iteration $iteration): void
    {
        $this->iterations[] = $iteration;
    }
}
