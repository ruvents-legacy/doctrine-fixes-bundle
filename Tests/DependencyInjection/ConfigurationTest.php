<?php

namespace Ruvents\DoctrineFixesBundle\Tests\DependencyInjection;

use Matthias\SymfonyConfigTest\PhpUnit\ConfigurationTestCaseTrait;
use Ruvents\DoctrineFixesBundle\DependencyInjection\Configuration;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    use ConfigurationTestCaseTrait;

    public function testEmpty()
    {
        $this->assertConfigurationIsValid([]);
    }

    public function testSchemaNamespaceFix()
    {
        $this->assertProcessedConfigurationEquals([], []);

        $this->assertProcessedConfigurationEquals(
            [
                'ruvents_doctrine_fixes' => [
                    'default' => [
                        'schema_namespace_fix' => null,
                    ],
                    'test' => [
                        'schema_namespace_fix' => [
                            'namespace' => 'public',
                        ],
                    ],
                ],
            ],
            [
                'default' => [
                    'schema_namespace_fix' => [
                        'enabled' => true,
                        'namespace' => null,
                    ],
                ],
                'test' => [
                    'schema_namespace_fix' => [
                        'enabled' => true,
                        'namespace' => 'public',
                    ],
                ],
            ]
        );
    }

    protected function getConfiguration()
    {
        return new Configuration();
    }
}
