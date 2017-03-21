# RUVENTS Doctrine Fixes Bundle

## Installation

1. Install the package via composer:
   ```console
   $ composer require ruvents/doctrine-fixes-bundle:~0.1.0
   ```

1. Register the bundle:
    ```php
    <?php
    // app/AppKernel.php
    
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = [
                // ...
                new Ruvents\DoctrineFixesBundle\RuventsDoctrineFixesBundle(),
            ];
        }
    }
    ```

## Configuration

```yaml
ruvents_doctrine_fixes:
    # connection name
    default:
        # all fixes are disabled by default but can be enabled
        schema_namespace_fix: ~
    another_connection:
        # ...
```

## Fixes

### Schema namespace fix ([doctrine/dbal#1110](https://github.com/doctrine/dbal/issues/1110))

```yaml
        # ...
        schema_namespace_fix:
            # namespace is null by default and $platform->getDefaultSchemaName() is used in this case
            namespace: 'public'
```
