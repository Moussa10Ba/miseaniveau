<?php

namespace ContainerNkVMlvF;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_PublicAlias_ApiPlatform_Swagger_Command_SwaggerCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'console.command.public_alias.api_platform.swagger.command.swagger_command' shared service.
     *
     * @return \ApiPlatform\Core\Bridge\Symfony\Bundle\Command\SwaggerCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Bridge/Symfony/Bundle/Command/SwaggerCommand.php';

        return $container->services['console.command.public_alias.api_platform.swagger.command.swagger_command'] = new \ApiPlatform\Core\Bridge\Symfony\Bundle\Command\SwaggerCommand(($container->services['serializer'] ?? $container->getSerializerService()), ($container->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? $container->getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService()), '', '', '0.0.0', NULL, $container->parameters['api_platform.swagger.versions']);
    }
}
