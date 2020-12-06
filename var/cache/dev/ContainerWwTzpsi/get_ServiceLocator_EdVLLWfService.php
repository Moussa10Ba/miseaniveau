<?php

namespace ContainerWwTzpsi;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_EdVLLWfService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.edVLLWf' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.edVLLWf'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\CompetenceController::AddCompetence' => ['privates', '.service_locator.IFW.IA7', 'get_ServiceLocator_IFW_IA7Service', true],
            'App\\Controller\\CompetenceController::updateCompetence' => ['privates', '.service_locator.jJBF8o1', 'get_ServiceLocator_JJBF8o1Service', true],
            'App\\Controller\\ProfilController::getListUserByProfil' => ['privates', '.service_locator.2c5Gf0K', 'get_ServiceLocator_2c5Gf0KService', true],
            'App\\Controller\\UtilisateurController::updateUser' => ['privates', '.service_locator.75QI9vP', 'get_ServiceLocator_75QI9vPService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'App\\Kernel::terminate' => ['privates', '.service_locator.beq5mCo', 'get_ServiceLocator_Beq5mCoService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'kernel::terminate' => ['privates', '.service_locator.beq5mCo', 'get_ServiceLocator_Beq5mCoService', true],
            'App\\Controller\\CompetenceController:AddCompetence' => ['privates', '.service_locator.IFW.IA7', 'get_ServiceLocator_IFW_IA7Service', true],
            'App\\Controller\\CompetenceController:updateCompetence' => ['privates', '.service_locator.jJBF8o1', 'get_ServiceLocator_JJBF8o1Service', true],
            'App\\Controller\\ProfilController:getListUserByProfil' => ['privates', '.service_locator.2c5Gf0K', 'get_ServiceLocator_2c5Gf0KService', true],
            'App\\Controller\\UtilisateurController:updateUser' => ['privates', '.service_locator.75QI9vP', 'get_ServiceLocator_75QI9vPService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.C9JCBPC', 'get_ServiceLocator_C9JCBPCService', true],
            'kernel:terminate' => ['privates', '.service_locator.beq5mCo', 'get_ServiceLocator_Beq5mCoService', true],
        ], [
            'App\\Controller\\CompetenceController::AddCompetence' => '?',
            'App\\Controller\\CompetenceController::updateCompetence' => '?',
            'App\\Controller\\ProfilController::getListUserByProfil' => '?',
            'App\\Controller\\UtilisateurController::updateUser' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::terminate' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'kernel::terminate' => '?',
            'App\\Controller\\CompetenceController:AddCompetence' => '?',
            'App\\Controller\\CompetenceController:updateCompetence' => '?',
            'App\\Controller\\ProfilController:getListUserByProfil' => '?',
            'App\\Controller\\UtilisateurController:updateUser' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:terminate' => '?',
        ]);
    }
}