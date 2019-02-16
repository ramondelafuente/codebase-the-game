<?php
declare(strict_types=1);

namespace Application;

use Codebase\Team;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GameCommand extends Command
{
    protected static $defaultName = 'codebase:game';

    protected function configure()
    {
        $this->setDescription('Starts the game');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Welcome to Codebase the game');

        $team = Team::form();
        $iteration = 1;

        while ($team->codebase()->bugCount() < 100) {
            $io->section(sprintf('Iteration %d', $iteration));

            $io->text('Number of features: ' . $team->inspectCodebase()['features']);
            $io->text('Number of bugs: ' . $team->inspectCodebase()['bugs']);

            $numberOfBugsToSolve = $io->ask('How many bugs do you want to fix this time?', 0, function ($number) {
                if (!is_numeric($number)) {
                    throw new \RuntimeException('You must type a number.');
                }

                return (int)$number;
            });

            $team->planIteration($numberOfBugsToSolve);

            $iteration++;
        }


    }
}
