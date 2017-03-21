<?php

namespace Ruvents\DoctrineFixesBundle\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Ruvents\DoctrineFixesBundle\DependencyInjection\RuventsDoctrineFixesExtension;

class RuventsDoctrineFixesExtensionTest extends AbstractExtensionTestCase
{
    public function testSchemaNamespaceFix()
    {
        $this->load([
            'default' => [
                'schema_namespace_fix' => null,
            ],
            'test' => [
                'schema_namespace_fix' => [
                    'namespace' => 'public',
                ],
            ],
        ]);

        $this->assertContainerBuilderHasServiceDefinitionWithTag(
            'ruvents_doctrine_fixes.default.schema_namespace_fix_listener',
            'doctrine.event_listener',
            [
                'event' => 'postGenerateSchema',
                'connection' => 'default',
            ]
        );

        $this->assertContainerBuilderHasServiceDefinitionWithArgument(
            'ruvents_doctrine_fixes.test.schema_namespace_fix_listener',
            0,
            'public'
        );
        $this->assertContainerBuilderHasServiceDefinitionWithTag(
            'ruvents_doctrine_fixes.test.schema_namespace_fix_listener',
            'doctrine.event_listener',
            [
                'event' => 'postGenerateSchema',
                'connection' => 'test',
            ]
        );
    }

    protected function getContainerExtensions()
    {
        return [
            new RuventsDoctrineFixesExtension(),
        ];
    }
}
