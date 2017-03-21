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
        $this->assertProcessedConfigurationEquals(
            [
            ],
            [
                'schema_namespace_fix' => [
                    'enabled' => false,
                    'namespace' => null,
                ],
            ]
        );

        $this->assertProcessedConfigurationEquals(
            [
                'ruvents_doctrine_fixes' => [
                    'schema_namespace_fix' => null,
                ],
            ],
            [
                'schema_namespace_fix' => [
                    'enabled' => true,
                    'namespace' => null,
                ],
            ]
        );
    }

    protected function getConfiguration()
    {
        return new Configuration();
    }
}
