<?php
declare(strict_types=1);

namespace Codebase\Phase;

use Codebase\Codebase;

final class Production
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
}
