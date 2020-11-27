<?php

namespace ContainerVexvxHq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_2c5Gf0KService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.2c5Gf0K' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.2c5Gf0K'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'profilRepo' => ['privates', 'App\\Repository\\ProfilRepository', 'getProfilRepositoryService', true],
        ], [
            'profilRepo' => 'App\\Repository\\ProfilRepository',
        ]);
    }
}