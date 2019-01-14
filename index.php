<?php

include 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

// Création de la route
$index = new Route(
    '/',
    array('_controller' => 'UnivLeMans\TP\Controller\IndexController::index')
);

$routeAccueil = new Route(
    '/accueil',
    array('_controller' => 'UnivLeMans\TP\Controller\AccueilController::index')
);

$routeRegister = new Route(
    '/register',
    array('_controller' => 'UnivLeMans\TP\Controller\UserController::register')
);

$routeLogin = new Route(
    '/login',
    array('_controller' => 'UnivLeMans\TP\Controller\UserController::login')
);

$routeLogout = new Route(
    '/logout',
    array('_controller' => 'UnivLeMans\TP\Controller\UserController::logout')
);

$routeFormulaireConnexion = new Route (
    '/connexion',
    array('_controller' => 'UnivLeMans\TP\Controller\UserController::index')
);

$routeEdt = new Route (
    '/agenda',
    array('_controller' => 'UnivLeMans\TP\Controller\EdtController::index')
);
$routeTest = new Route (
  '/test',
  array('_controller' => 'UnivLeMans\TP\Controller\EdtController::test')
);

// Ajout des routes de notre application
$routes = new RouteCollection();
$routes->add('index', $index);
$routes->add('accueil', $routeAccueil);
$routes->add('register', $routeRegister);
$routes->add('login', $routeLogin);
$routes->add('logout', $routeLogout);
$routes->add('connexion', $routeFormulaireConnexion);
$routes->add('agenda', $routeEdt);
$routes->add('test', $routeTest);


// Match des routes
$request = Request::createFromGlobals();

$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

try {
    $parameters = $matcher->matchRequest($request);

    $controllerPath = $parameters['_controller'];
    list($controllerClass, $controllerFunction) = explode('::', $controllerPath);
    unset($parameters['_controller']);
    $controller = new $controllerClass();
    /** @var Response $response */
    $response = $controller->$controllerFunction($request, $parameters);
} catch (ResourceNotFoundException $exception) {
    $response = new Response($exception->getMessage(), Response::HTTP_NOT_FOUND);
}

$response->prepare($request);
$response->send();