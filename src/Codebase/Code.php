<?php

namespace Codebase;

interface Code
{
    /**
     * @return Feature[]
     */
    public function features(): array;

    public function addFeature(Feature $feature): void;

    public function bugCount(): int;

    public function featureCount(): int;

    public function findBugs(int $numberOfBugs): void;

    public function solveBugs(int $numberOfBugs): void;
}
