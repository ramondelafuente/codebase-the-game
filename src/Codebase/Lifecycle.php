<?php
declare(strict_types=1);

namespace Codebase;

final class Lifecycle
{
    /**
     * @var Code
     */
    private $codebase;

    /**
     * @var Iteration[]
     */
    private $iterations;

    private function __construct()
    {
    }

    public static function initialize()
    {
        $lifecycle = new Lifecycle();
        $lifecycle->codebase = Codebase::initialize();
        $lifecycle->iterations = [];

        return $lifecycle;
    }

    public function codebase(): Code
    {
        return $this->codebase;
    }

    public function iterations(): array
    {
        return $this->iterations;
    }
}
