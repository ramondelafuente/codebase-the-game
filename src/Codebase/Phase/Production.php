<?php
declare(strict_types=1);

namespace Codebase\Phase;

use Codebase\Codebase;
use Codebase\Phase;

final class Production implements Phase
{
    /**
     * @var Codebase
     */
    private $codebase;

    private function __construct()
    {
    }

    public static function plan(Codebase $codebase): self
    {
        $production = new Production();
        $production->codebase  = $codebase;

        return $production;
    }

    public function run(): Codebase
    {
        // TODO: Implement run() method.
    }
}
