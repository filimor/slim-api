<?php
if (PHP_SAPI != 'cli') {
    exit('Run via CLI');
}

require __DIR__ . '/vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/src/dependencies.php';

$db = $container->get('db');
$schema = $db->schema();
$productsTable = 'products';
$schema->dropIfExists($productsTable);

$schema->create($productsTable, function($table){
    $table->increments('id');
    $table->string('title', 100);
    $table->text('description');
    $table->decimal('price', 11, 2);
    $table->string('manufacturer', 60);
    $table->date('creation_date');
});