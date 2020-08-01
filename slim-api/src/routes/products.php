<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->group('/api/v1', function(){
    $this->get('/products', function(Request $request, Response $response){
        return $response->withJson(['name' => 'Moto G']);
    });
});