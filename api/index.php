<?php
/**
 * Created by PhpStorm.
 * User: nimda22
 * Date: 24.05.2015
 * Time: 09:56
 */

require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app = \Slim\Slim::getInstance();



$app->options('/square/:val', function () use($app) {
    $response = $app->response();
    $response->header('Access-Control-Allow-Origin', '*');
    $response->header('Access-Control-Allow-Headers', 'origin, x-requested-with, content-type');
    $response->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, DELETE, PUT');

});


$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->get('/square/:val', function ($val) use($app) {

    $result = $val * $val;
    $post_data = array('input_val' => $val,
        'output_val' => $result);

    echo json_encode($post_data);
});



$app->run();





