<?php

namespace Codebase;

interface Phase
{
    public function run(Code $codebase): Code;
}
