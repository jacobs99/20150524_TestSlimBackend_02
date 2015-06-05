<?php

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app = \Slim\Slim::getInstance();


// make sure the square route has CORS enabled...option call
$app->options('/square/:val', function () use($app) {
    $response = $app->response();
    $response->header('Access-Control-Allow-Origin', '*');
    $response->header('Access-Control-Allow-Headers', 'origin, x-requested-with, content-type');
    $response->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, DELETE, PUT');

});


// hello world get route
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});


// sample get route to square a number
$app->get('/square/:val', function ($val) use($app) {

    // get response object
    $response = $app->response();

    // enable CORS on get call
    $response->header('Access-Control-Allow-Origin', '*');

    $result = $val * $val;
    $post_data = array('input_val' => $val,
        'output_val' => $result);

    $response->body(json_encode($post_data));
});


$app->run();





