<?php
declare(strict_types=1);

namespace Codebase;

class GiveUp extends \Exception
{
    /**
     * @var int
     */
    public $iterations;

    /**
     * @var int
     */
    public $bugs;

    /**
     * @var int
     */
    public $features;

    public static function tooManyBugs(int $iterations, int $features, int $bugs): \Exception
    {
        $exception = new self(sprintf(
            'We have been declared technically bankrupt after %d iterations, with %d features and %d bugs',
            $iterations,
            $features,
            $bugs
        ));

        $exception->iterations = $iterations;
        $exception->bugs = $bugs;
        $exception->features = $features;

        return $exception;
    }
}
