<?php

namespace Codebase;

interface Phase
{
    public function run(Codebase $codebase): Codebase;
}
