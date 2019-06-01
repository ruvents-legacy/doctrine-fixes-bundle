<?php

namespace Ruvents\DoctrineFixesBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('ruvents_doctrine_fixes');

        /** @noinspection PhpUndefinedMethodInspection */
        $treeBuilder
            ->getRootNode()
            ->useAttributeAsKey('connection')
            ->prototype('array')
                ->children()
                    ->arrayNode('schema_namespace_fix')
                        ->canBeEnabled()
                        ->children()
                            ->scalarNode('namespace')->defaultNull()->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
