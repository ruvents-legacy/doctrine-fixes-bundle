<?php

namespace Ruvents\DoctrineFixesBundle\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Ruvents\DoctrineFixesBundle\DependencyInjection\RuventsDoctrineFixesExtension;

class RuventsDoctrineFixesExtensionTest extends AbstractExtensionTestCase
{
    public function testEmpty()
    {
        $this->load();
        $this->assertContainerBuilderNotHasService('ruvents_doctrine_fixes.event_listener.schema_namespace_fix');
    }

    public function testSchemaNamespaceFix()
    {
        $this->load([
            'schema_namespace_fix' => null,
        ]);
        $this->assertContainerBuilderHasServiceDefinitionWithTag(
            'ruvents_doctrine_fixes.event_listener.schema_namespace_fix',
            'doctrine.event_listener',
            ['event' => 'postGenerateSchema']
        );
    }

    public function testSchemaNamespaceFixNamespace()
    {
        $this->load([
            'schema_namespace_fix' => [
                'namespace' => 'public',
            ],
        ]);
        $this->assertContainerBuilderHasServiceDefinitionWithArgument(
            'ruvents_doctrine_fixes.event_listener.schema_namespace_fix',
            0,
            'public'
        );
    }

    protected function getContainerExtensions()
    {
        return [
            new RuventsDoctrineFixesExtension(),
        ];
    }
}
