<?php

use EspServer\Common\DDD\CommandResponse;
use EspServer\WorkoutAutomaticGenerator\Command\GenerateWorkoutCommand;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html.twig', array ());
})->bind('homepage');

$app->post('/automaticworkout', function () use ($app) {
    $command = new GenerateWorkoutCommand();
    /** @var CommandResponse $response */
    $response = $app['commandBus']->dispatch($command);
    
    return new JsonResponse(["id" => $response->value()]);
});

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }
    
    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array (
        'errors/' . $code . '.html.twig',
        'errors/' . substr($code, 0, 2) . 'x.html.twig',
        'errors/' . substr($code, 0, 1) . 'xx.html.twig',
        'errors/default.html.twig',
    );
    
    return new Response($app['twig']->resolveTemplate($templates)->render(array ('code' => $code)), $code);
});
