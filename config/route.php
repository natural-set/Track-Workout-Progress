
<?php

use App\Controller\LiveWorkoutController;
use App\Controller\UserController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

/* $route = new Route(
    '/',
    ['_controller' => UserController::class, '_method' => 'getAll']
);
$routes->add('user_all', $route); */

$indexPage = new Route(
    '/',
    ['_controller' => UserController::class, '_method' => 'indexPage']
);
$routes->add('indexPage', $indexPage);

$live_workout_page = new Route(
    '/live_workout',
    ['_controller' => LiveWorkoutController::class, '_method' => 'liveWorkoutPage']

);
$routes->add('live_workout_page', $live_workout_page);


$exercises = new Route(
    '/exercises',
    ['_controller' => LiveWorkoutController::class, '_method' => 'getExercises']
);
$routes->add('exercises', $exercises);