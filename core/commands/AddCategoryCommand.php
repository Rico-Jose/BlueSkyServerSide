<?php

namespace app\core\commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \app\core\Category;

class AddCategoryCommand extends Command
{
    // Configure this command
    protected function configure()
    {
        $this->setName('ac')
             ->setHelp('Enter the command followed by a category name')
             ->setDescription('Add a category')
             ->addArgument('name', InputArgument::REQUIRED);
    }

    // Execute this command
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $category = new Category($name);
        $output->writeln($name . ' has been added');
        $output->writeln('');
        
        $categories = Category::fetchCategories();
        if ($categories) {
            $output->writeln('Category List:');
            foreach ($categories as $category) {
                $output->writeln($category['name']);
            }
        }
        $output->writeln('');
        return Command::SUCCESS;
    }
}