<?php
declare(strict_types=1);

namespace Application\Console;

use Codebase\Team;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class Game extends Command
{
    protected static $defaultName = 'game:start';

    protected function configure()
    {
        $this->setDescription('Starts the game');
        $this->addOption('capacity', 'c', InputOption::VALUE_REQUIRED, 'The team capacity', 18);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Welcome to Codebase the game');
        $capacity = (int)$input->getOption('capacity');

        $team = Team::form($capacity);

        while ($team->capacity() > $team->codebase()->bugCount()) {
            $io->section(sprintf('Iteration %d', $team->lifecycle()->iterationCount()));

            $io->text('Number of features: ' . $team->inspectCodebase()['features']);
            $io->text('Number of bugs: ' . $team->inspectCodebase()['bugs']);

            $numberOfBugsToSolve = $io->ask(
                'How many bugs do you want to fix this time?',
                $team->inspectCodebase()['bugs'],
                function ($number) {
                    if (!is_numeric($number)) {
                        throw new \RuntimeException('You must type a number.');
                    }

                    return (int)$number;
                }
            );

            $team->planIteration($numberOfBugsToSolve);
        }

        $io->error(
            sprintf(
                'You have been declared technically bankrupt after %d iterations',
                $team->lifecycle()->iterationCount()
            )
        );
        $io->text('Number of features: ' . $team->inspectCodebase()['features']);
        $io->text('Number of bugs: ' . $team->inspectCodebase()['bugs']);
    }
}
