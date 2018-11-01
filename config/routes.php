<?php


use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    
    /*  This set's the Users controller and view as the index page!
    $routes->connect('/', ['controller' => 'Users', 'action' => 'index']);
    */
    
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
  
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $routes->fallbacks(DashedRoute::class);
});


//https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=GOOG&apikey=L1G9JSZ77QFGSV8A