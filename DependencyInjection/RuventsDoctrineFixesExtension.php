<?php

namespace Ruvents\DoctrineFixesBundle\DependencyInjection;

use Ruvents\DoctrineFixesBundle\EventListener\SchemaNamespaceFixListener;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;

class RuventsDoctrineFixesExtension extends ConfigurableExtension
{
    /**
     * {@inheritdoc}
     */
    public function loadInternal(array $mergedConfig, ContainerBuilder $container)
    {
        foreach ($mergedConfig as $connection => $config) {
            if ($config['schema_namespace_fix']['enabled']) {
                $name = sprintf('ruvents_doctrine_fixes.%s.schema_namespace_fix_listener', $connection);
                $definition = (new Definition())
                    ->setClass(SchemaNamespaceFixListener::class)
                    ->setPublic(false)
                    ->addArgument($config['schema_namespace_fix']['namespace'])
                    ->addTag('doctrine.event_listener', [
                        'event' => 'postGenerateSchema',
                        'connection' => $connection,
                    ]);
                $container->setDefinition($name, $definition);
            }
        }
    }
}
