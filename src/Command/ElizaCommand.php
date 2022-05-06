<?php

namespace App\Command;

use App\Model\Eliza;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'eliza',
    description: 'Add a short description for your command',
)]
class ElizaCommand extends Command {

    protected function execute(InputInterface $input, OutputInterface $output)
    : int {

        $io = new SymfonyStyle($input, $output);

        $helper = $this->getHelper('question');
        $question = new Question(Eliza::sayHello()."\n-> ", 'quit');
        $userInput = $helper->ask($input, $output, $question);

        while (strtolower($userInput) != 'quit') {
            $question = new Question("\n".Eliza::respondTo($userInput)."\n-> ", 'quit');
            $userInput = $helper->ask($input, $output, $question);
        }

        $io->text(Eliza::sayGoodBye());

        return Command::SUCCESS;
    }
}
