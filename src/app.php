<?php

use EspServer\Common\DDD\DispatcherCommandBus;
use EspServer\Common\DDD\InMemoryCommandHandlerMap;
use EspServer\WorkoutAutomaticGenerator\Command\GenerateWorkoutCommandHandler;
use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...
    
    return $twig;
});

$app['commandBus'] = function ($c) {
    $generateWorkoutCommandHandler = new GenerateWorkoutCommandHandler();
    
    $commandHandlerCollection = [$generateWorkoutCommandHandler->listenTo() => $generateWorkoutCommandHandler];
    
    return new DispatcherCommandBus(new InMemoryCommandHandlerMap($commandHandlerCollection));
};

return $app;
