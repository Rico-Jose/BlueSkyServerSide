<?php

require_once 'vendor/autoload.php';

$category = new \app\core\Category();
$cats = $category->getCategory(2);
foreach ($cats as $cat) {
    echo $cat['name'];
}