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
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ruvents_doctrine_fixes');

        $rootNode
            ->children()
                ->arrayNode('schema_namespace_fix')->canBeEnabled()->end()
            ->end();

        return $treeBuilder;
    }
}
