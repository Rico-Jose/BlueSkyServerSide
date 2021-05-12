<?php

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Symfony\Component\Console\Application();

// Register commands
$app->addCommands([new \app\core\commands\AddCategoryCommand()]);
$app->addCommands([new \app\core\commands\FetchCategoriesCommand()]);
$app->addCommands([new \app\core\commands\FetchCategoryCommand()]);

$app->run();