<?php

namespace Ruvents\DoctrineFixesBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class RuventsDoctrineFixesExtension extends ConfigurableExtension
{
    /**
     * {@inheritdoc}
     */
    public function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        if ($mergedConfig['schema_namespace_fix']['enabled']) {
            $loader->load('schema_namespace_fix.yml');
            $container
                ->findDefinition('ruvents_doctrine_fixes.event_listener.schema_namespace_fix')
                ->replaceArgument(0, $mergedConfig['schema_namespace_fix']['namespace']);
        }
    }
}
