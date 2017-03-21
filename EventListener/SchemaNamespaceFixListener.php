<?php

namespace Ruvents\DoctrineFixesBundle\EventListener;

use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;

class SchemaNamespaceFixListener
{
    /**
     * @var string|null
     */
    private $namespace;

    /**
     * @param string|null $namespace
     */
    public function __construct($namespace = null)
    {
        $this->namespace = $namespace;
    }

    /**
     * @param GenerateSchemaEventArgs $args
     */
    public function postGenerateSchema(GenerateSchemaEventArgs $args)
    {
        $namespace = null === $this->namespace
            ? $args->getEntityManager()->getConnection()->getDatabasePlatform()->getDefaultSchemaName()
            : $this->namespace;

        $args->getSchema()->hasNamespace($namespace) || $args->getSchema()->createNamespace($namespace);
    }
}
