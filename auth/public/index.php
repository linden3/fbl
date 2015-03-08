<?php
use Fbl\App\Application\IdentityApi;
use Silex\Application as SilexApplication;
use Symfony\Component\HttpFoundation\Response;

require_once(__DIR__ . '/../vendor/autoload.php');

$app = new SilexApplication();
$app->error(function(Exception $e, $code) {
    if ($code === 404) {
        return new Response('Not found!', 404);
    }
    return new Response($e->getMessage(), 500);
});
$app->post('/player/register', 'Fbl\\App\\Controller\\PlayerController::registerPlayerAction');

$api = new IdentityApi($app);
$api->run();