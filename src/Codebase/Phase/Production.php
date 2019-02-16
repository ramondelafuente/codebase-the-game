<?php
declare(strict_types=1);

namespace Codebase\Phase;

use Codebase\Codebase;
use Codebase\Phase;

final class Production implements Phase
{
    private function __construct()
    {
    }

    public static function plan(): self
    {
        $production = new Production();

        return $production;
    }

    public function run(Codebase $codebase): Codebase
    {
        // TODO
        // 1. for each feature, determine if there is a bug found
        // 2. update the codebase

        // return the codebase
    }
}
