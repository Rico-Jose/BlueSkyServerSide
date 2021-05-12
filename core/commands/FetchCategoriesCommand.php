<?php

namespace app\core\commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \app\core\Category;

class FetchCategoriesCommand extends Command
{
    // Configure this command
    protected function configure()
    {
        $this->setName('gc')->setDescription('Show all categories');
    }

    // Execute this command
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $categories = Category::fetchCategories();
        if ($categories) {
            $output->writeln('Category List:');
            foreach ($categories as $category) {
                $output->writeln($category['name']);
            }
            
            $output->writeln('');
            return Command::SUCCESS;
        }

        $output->write('The categories table is empty');
            
        $output->writeln('');
        return Command::SUCCESS;
    }
}