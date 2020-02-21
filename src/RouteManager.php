<?php


namespace Juinsa;


use DI\Container;

class RouteManager
{
    private $container;

    public function __construct( Container $container)
    {
        $this->container = $container;
    }

    public function dispatch(string $requestMethod, string $requestUri, \FastRoute\Dispatcher $dispatcher)
    {
        $route = $dispatcher->dispatch($requestMethod, $requestUri);
        switch ($route[0])
        {
            case \FastRoute\Dispatcher::NOT_FOUND:
                header("HTTP/1.0 404 NotFound");
                echo "<h1>NOT FOUND</h1>";
                break;
            case \FastRoute\Dispatcher::FOUND:

                //Forma con la inyección de dependencia en el construct
                $controller = $route[1];
                $action = $route[2];
                $this->container->call($controller, $action);

                //Forma manual
//                $data = $route[1];
//                $controller = $data[0];
//                $action = $data[1];
//                $objController = new $controller();
//                $objController->$action();

                break;
        }
    }
}