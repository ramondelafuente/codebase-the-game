<?php

namespace Codebase;

interface BugCalculator
{
    public function calculate(Code $codebase): int;
}
