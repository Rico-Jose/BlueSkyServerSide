<?php

require_once 'vendor/autoload.php';

$category = new \app\core\Category();
$all = $category->getAll();

echo '<pre>';
var_dump($all);
echo '</pre>';
exit;