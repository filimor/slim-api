<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\Product;

// Products routes
$app->group('/api/v1', function(){

    // List products
    $this->get('/products/list', function(Request $request, Response $response){
        $products = Product::get();
        return $response->withJson($products);
    });

    // Add a product
    $this->post('/products/add', function(Request $request, Response $response){
        $data = $request->getParsedBody();
        $product = Product::create($data);
        return $response->withJson($product);
    });

    // Get a product by id
    $this->get('/products/list/{id}', function(Request $request, Response $response, $args){
        $product = Product::findOrFail($args['id']);
        return $response->withJson($product);
    });

    // Update a product
    $this->put('/products/update/{id}', function(Request $request, Response $response, $args){
        $data = $request->getParsedBody();
        $product = Product::findOrFail($args['id']);
        $product->update($data);
        return $response->withJson($product);
    });

    // Delete a product
    $this->get('/products/remove/{id}', function(Request $request, Response $response, $args){
        $product = Product::findOrFail($args['id']);
        $product->delete();
        return $response->withJson($product);
    });
});