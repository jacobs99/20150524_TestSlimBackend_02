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

/*
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}



if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) && (
            $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'POST' ||
            $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'GET' ||
            $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'DELETE' ||
            $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'PUT' )) {


        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Headers: X-Requested-With');
        header('Access-Control-Allow-Headers: Content-Type');
        header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
        header('Access-Control-Max-Age: 86400');

    }
    exit;
}

*/


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





