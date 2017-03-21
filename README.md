# RUVENTS Doctrine Fixes Bundle

## Configuration

```yaml
ruvents_doctrine_fixes:
    # all fixes are disabled by default but can be enabled
    schema_namespace_fix: ~
```

## Fixes

### Schema namespace fix ([doctrine/dbal#1110](https://github.com/doctrine/dbal/issues/1110))

```yaml
ruvents_doctrine_fixes:
    schema_namespace_fix:
        # null by default
        # if null, $platform->getDefaultSchemaName() is used
        namespace: 'public'
```
