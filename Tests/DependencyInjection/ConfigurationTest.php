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
        $this->assertConfigurationIsValid([
            'ruvents_doctrine_fixes' => [
                'schema_namespace_fix' => null,
            ],
        ]);

        $this->assertConfigurationIsValid([
            'ruvents_doctrine_fixes' => [
                'schema_namespace_fix' => true,
            ],
        ]);
    }

    protected function getConfiguration()
    {
        return new Configuration();
    }
}
