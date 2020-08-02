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
    $table->timestamps();
});

$db->table($productsTable)->insert([
    'title' => 'Smartphone Motorola Moto G6 32GB Dual Chip',
    'description' => 'Android Oreo - 8.0 Tela 5.7" Octa-Core 1.8 GHz 4G Câmera 12 + 5MP (Dual Traseira) - Índigo',
    'price' => 899.00,
    'manufacturer' => 'Motorola',
    'created_at' => '2019-10-22',
    'updated_at' => '2019-10-22'
]);

$db->table($productsTable)->insert([
    'title' => 'iPhone X Cinza Espacial 64GB',
    'description' => 'Tela 5.8" IOS 12 4G Wi-Fi Câmera 12MP - Apple',
    'price' => 4999.00,
    'manufacturer' => 'Apple',
    'created_at' => '2020-10-01',
    'updated_at' => '2020-10-01'
]);