<?php

namespace Ruvents\DoctrineFixesBundle\EventListener;

use Doctrine\ORM\Tools\Event\GenerateSchemaEventArgs;

class SchemaNamespaceFixListener
{
    /**
     * @param GenerateSchemaEventArgs $args
     */
    public function postGenerateSchema(GenerateSchemaEventArgs $args)
    {
        $namespace = $args->getEntityManager()->getConnection()->getDatabasePlatform()->getDefaultSchemaName();
        $args->getSchema()->hasNamespace($namespace) || $args->getSchema()->createNamespace($namespace);
    }
}
