<?php
// src/Kernel.php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        // Configure your routes here.
        // For example, to import routes from a YAML file:
        // $routes->import('../config/routes.yaml');
    }

    protected function configureContainer(\Symfony\Component\DependencyInjection\ContainerBuilder $container, \Symfony\Component\Config\Loader\LoaderInterface $loader): void
    {
        // Configure your container (load services, parameters, etc.)
    }
}
