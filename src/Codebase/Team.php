<?php
declare(strict_types=1);

namespace Codebase;

final class Team
{
    /**
     * @var Code
     */
    private $codebase;

    /**
     * @var Lifecycle
     */
    private $lifecycle;

    private function __construct()
    {
    }

    public static function form(): Team
    {
        $team = new Team();
        $team->codebase = Codebase::initialize();
        $team->lifecycle = Lifecycle::begin($team->codebase);

        return $team;
    }

    public function codebase(): Code
    {
        return $this->codebase;
    }

    public function lifecycle(): Lifecycle
    {
        return $this->lifecycle;
    }
}
