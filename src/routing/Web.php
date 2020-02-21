<?php


namespace Juinsa\routing;


use FastRoute\Dispatcher;

class Web
{
    public static function getDispatcher():Dispatcher{
        return \FastRoute\simpleDispatcher(
          function (\FastRoute\RouteCollector $route) {
              $route->addRoute('GET', '/', ['Juinsa\controllers\HomeController', 'index']);
              $route->addRoute('GET', '/who', ['Juinsa\controllers\WhoController', 'index']);
          }
        );
    }
}