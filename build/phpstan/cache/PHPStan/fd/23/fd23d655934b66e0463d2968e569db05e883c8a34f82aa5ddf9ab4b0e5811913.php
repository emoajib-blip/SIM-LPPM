<?php declare(strict_types = 1);

// osfsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../spatie/laravel-medialibrary/src/MediaCollections/Commands/CleanCommand.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Spatie\MediaLibrary\MediaCollections\Commands\CleanCommand
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-e89938c8bcfb91efb29ac40d205384894038c25b1f1a4d51d3f403b1022f0ec7-8.4.1-6.65.0.9',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../spatie/laravel-medialibrary/src/MediaCollections/Commands/CleanCommand.php',
      ),
    ),
    'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands',
    'name' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
    'shortName' => 'CleanCommand',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 19,
    'endLine' => 237,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Console\\Command',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Illuminate\\Console\\ConfirmableTrait',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'signature' => 
      array (
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'name' => 'signature',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '\'media-library:clean {modelType?} {collectionName?} {disk?}
    {--dry-run : List files that will be removed without removing them},
    {--force : Force the operation to run when in production},
    {--rate-limit= : Limit the number of requests per second},
    {--delete-orphaned : Delete orphaned media items},
    {--skip-conversions : Do not remove deprecated conversions}\'',
          'attributes' => 
          array (
            'startLine' => 23,
            'endLine' => 28,
            'startTokenPos' => 93,
            'startFilePos' => 821,
            'endTokenPos' => 93,
            'endFilePos' => 1198,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 23,
        'endLine' => 28,
        'startColumn' => 5,
        'endColumn' => 65,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'description' => 
      array (
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'name' => 'description',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '\'Clean deprecated conversions and files without related model.\'',
          'attributes' => 
          array (
            'startLine' => 30,
            'endLine' => 30,
            'startTokenPos' => 102,
            'startFilePos' => 1231,
            'endTokenPos' => 102,
            'endFilePos' => 1293,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 30,
        'endLine' => 30,
        'startColumn' => 5,
        'endColumn' => 93,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'mediaRepository' => 
      array (
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'name' => 'mediaRepository',
        'modifiers' => 2,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Spatie\\MediaLibrary\\MediaCollections\\MediaRepository',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 32,
        'endLine' => 32,
        'startColumn' => 5,
        'endColumn' => 47,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'fileManipulator' => 
      array (
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'name' => 'fileManipulator',
        'modifiers' => 2,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Spatie\\MediaLibrary\\Conversions\\FileManipulator',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 34,
        'endLine' => 34,
        'startColumn' => 5,
        'endColumn' => 47,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'fileSystem' => 
      array (
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'name' => 'fileSystem',
        'modifiers' => 2,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Contracts\\Filesystem\\Factory',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 36,
        'endLine' => 36,
        'startColumn' => 5,
        'endColumn' => 34,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'isDryRun' => 
      array (
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'name' => 'isDryRun',
        'modifiers' => 2,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'default' => 
        array (
          'code' => 'false',
          'attributes' => 
          array (
            'startLine' => 38,
            'endLine' => 38,
            'startTokenPos' => 134,
            'startFilePos' => 1462,
            'endTokenPos' => 134,
            'endFilePos' => 1466,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 38,
        'endLine' => 38,
        'startColumn' => 5,
        'endColumn' => 37,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'rateLimit' => 
      array (
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'name' => 'rateLimit',
        'modifiers' => 2,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'int',
            'isIdentifier' => true,
          ),
        ),
        'default' => 
        array (
          'code' => '0',
          'attributes' => 
          array (
            'startLine' => 40,
            'endLine' => 40,
            'startTokenPos' => 145,
            'startFilePos' => 1501,
            'endTokenPos' => 145,
            'endFilePos' => 1501,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 40,
        'endLine' => 40,
        'startColumn' => 5,
        'endColumn' => 33,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
    ),
    'immediateMethods' => 
    array (
      'handle' => 
      array (
        'name' => 'handle',
        'parameters' => 
        array (
          'mediaRepository' => 
          array (
            'name' => 'mediaRepository',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Spatie\\MediaLibrary\\MediaCollections\\MediaRepository',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 43,
            'endLine' => 43,
            'startColumn' => 9,
            'endColumn' => 40,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'fileManipulator' => 
          array (
            'name' => 'fileManipulator',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Spatie\\MediaLibrary\\Conversions\\FileManipulator',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 44,
            'endLine' => 44,
            'startColumn' => 9,
            'endColumn' => 40,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'fileSystem' => 
          array (
            'name' => 'fileSystem',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Illuminate\\Contracts\\Filesystem\\Factory',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 45,
            'endLine' => 45,
            'startColumn' => 9,
            'endColumn' => 27,
            'parameterIndex' => 2,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 42,
        'endLine' => 69,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'aliasName' => NULL,
      ),
      'getMediaItems' => 
      array (
        'name' => 'getMediaItems',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Support\\LazyCollection',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/** @return LazyCollection<int, Media> */',
        'startLine' => 72,
        'endLine' => 93,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'aliasName' => NULL,
      ),
      'deleteOrphanedMediaItems' => 
      array (
        'name' => 'deleteOrphanedMediaItems',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 95,
        'endLine' => 112,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'aliasName' => NULL,
      ),
      'getOrphanedMediaItems' => 
      array (
        'name' => 'getOrphanedMediaItems',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Support\\LazyCollection',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/** @return LazyCollection<int, Media> */',
        'startLine' => 115,
        'endLine' => 124,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'aliasName' => NULL,
      ),
      'deleteFilesGeneratedForDeprecatedConversions' => 
      array (
        'name' => 'deleteFilesGeneratedForDeprecatedConversions',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 126,
        'endLine' => 139,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'aliasName' => NULL,
      ),
      'deleteConversionFilesForDeprecatedConversions' => 
      array (
        'name' => 'deleteConversionFilesForDeprecatedConversions',
        'parameters' => 
        array (
          'media' => 
          array (
            'name' => 'media',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 141,
            'endLine' => 141,
            'startColumn' => 70,
            'endColumn' => 81,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 141,
        'endLine' => 160,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'aliasName' => NULL,
      ),
      'deleteDeprecatedResponsiveImages' => 
      array (
        'name' => 'deleteDeprecatedResponsiveImages',
        'parameters' => 
        array (
          'media' => 
          array (
            'name' => 'media',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 162,
            'endLine' => 162,
            'startColumn' => 57,
            'endColumn' => 68,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 162,
        'endLine' => 180,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'aliasName' => NULL,
      ),
      'deleteOrphanedDirectories' => 
      array (
        'name' => 'deleteOrphanedDirectories',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 182,
        'endLine' => 218,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'aliasName' => NULL,
      ),
      'markConversionAsRemoved' => 
      array (
        'name' => 'markConversionAsRemoved',
        'parameters' => 
        array (
          'media' => 
          array (
            'name' => 'media',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 220,
            'endLine' => 220,
            'startColumn' => 48,
            'endColumn' => 59,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'conversionPath' => 
          array (
            'name' => 'conversionPath',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'string',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 220,
            'endLine' => 220,
            'startColumn' => 62,
            'endColumn' => 83,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 220,
        'endLine' => 236,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Commands\\CleanCommand',
        'aliasName' => NULL,
      ),
    ),
    'traitsData' => 
    array (
      'aliases' => 
      array (
      ),
      'modifiers' => 
      array (
      ),
      'precedences' => 
      array (
      ),
      'hashes' => 
      array (
      ),
    ),
  ),
));