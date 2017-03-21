# RUVENTS Doctrine Fixes Bundle

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
