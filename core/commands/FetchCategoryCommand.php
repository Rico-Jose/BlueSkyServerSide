<?php

namespace app\core\commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \app\core\Category;

class FetchCategoryCommand extends Command
{
    // Configure this command
    protected function configure()
    {
        $this->setName('sc')
             ->setHelp('Enter the command followed by the id of the category')
             ->setDescription('Select a category')
             ->addArgument('id', InputArgument::REQUIRED);
    }

    // Execute this command
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $id = $input->getArgument('id');
        $category = Category::fetchCategory($id);
        if ($category) {
            $output->writeln('The category with an id of ' . $category['id'] . ' is ' . $category['name']);

            $output->writeln('');
            return Command::SUCCESS;
        }
        
        $output->writeln('This category does not exist');

        $output->writeln('');
        return Command::SUCCESS;
    }
}