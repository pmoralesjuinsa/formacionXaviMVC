<?php
declare (strict_types=1);

namespace Juinsa;

use DI\ContainerBuilder;

class Kernel
{

    protected $logManager;
    protected $viewManager;

//   public function __construct()
//   {
//       $this->logManager = new LogManager();
//       $this->logManager->info("Start Project Juinsa");
//       $this->viewManager = new ViewManager();
//       $this->viewManager->renderTemplate("index.twig.html");
//
//   }

    public function __construct()
    {
        $this->container = new ContainerBuilder();
        $this->logger = $this->container->get(LogManager::class);
    }

    public function init()
    {
        $this->logger->info("iniciando");
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//        Kint::dump($httpMethod."->".$uri);

        //Con programación orientada a objetos
//        $routeManager = new RouteManager();
//        $routeManager->dispatch($httpMethod, $uri, Web::getDispatcher());

        //Con inyección de dependencias
        $routeManager = $this->container->get(RouteManager::class);
        $routeManager->dispatch($httpMethod, $uri, Web::getDispatcher());
    }

    public function createContainer()
    {
    $containerBuilder = new ContainerBuilder();
    $containerBuilder->useAutowiring(true);
    return $containerBuilder->build();
    }

}