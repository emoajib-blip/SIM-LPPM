<?php declare(strict_types = 1);

// osfsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../spatie/laravel-medialibrary/src/MediaCollections/Models/Media.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Spatie\MediaLibrary\MediaCollections\Models\Media
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-5eb6aa9efc921e2c60ffd12694b5211ff4d1019edffe016009b5a9842d719503-8.4.1-6.65.0.9',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../spatie/laravel-medialibrary/src/MediaCollections/Models/Media.php',
      ),
    ),
    'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
    'name' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
    'shortName' => 'Media',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property string $uuid
 * @property string $model_type
 * @property string|int $model_id
 * @property string $collection_name
 * @property string $name
 * @property string $file_name
 * @property string $mime_type
 * @property string $disk
 * @property string $conversions_disk
 * @property string $type
 * @property string $extension
 * @property-read string $human_readable_size
 * @property-read string $preview_url
 * @property-read string $original_url
 * @property int $size
 * @property ?int $order_column
 * @property array $manipulations
 * @property array $custom_properties
 * @property array $generated_conversions
 * @property array $responsive_images
 * @property-read ?\\Illuminate\\Support\\Carbon $created_at
 * @property-read ?\\Illuminate\\Support\\Carbon $updated_at
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 64,
    'endLine' => 546,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
    'implementsClassNames' => 
    array (
      0 => 'Illuminate\\Contracts\\Mail\\Attachable',
      1 => 'Illuminate\\Contracts\\Support\\Htmlable',
      2 => 'Illuminate\\Contracts\\Support\\Responsable',
    ),
    'traitClassNames' => 
    array (
      0 => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Concerns\\CustomMediaProperties',
      1 => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Concerns\\HasUuid',
      2 => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Concerns\\IsSorted',
    ),
    'immediateConstants' => 
    array (
      'TYPE_OTHER' => 
      array (
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'name' => 'TYPE_OTHER',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '\'other\'',
          'attributes' => 
          array (
            'startLine' => 72,
            'endLine' => 72,
            'startTokenPos' => 235,
            'startFilePos' => 2759,
            'endTokenPos' => 235,
            'endFilePos' => 2765,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 72,
        'endLine' => 72,
        'startColumn' => 5,
        'endColumn' => 38,
      ),
    ),
    'immediateProperties' => 
    array (
      'table' => 
      array (
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'name' => 'table',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '\'media\'',
          'attributes' => 
          array (
            'startLine' => 70,
            'endLine' => 70,
            'startTokenPos' => 224,
            'startFilePos' => 2719,
            'endTokenPos' => 224,
            'endFilePos' => 2725,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 70,
        'endLine' => 70,
        'startColumn' => 5,
        'endColumn' => 31,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'guarded' => 
      array (
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'name' => 'guarded',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[]',
          'attributes' => 
          array (
            'startLine' => 74,
            'endLine' => 74,
            'startTokenPos' => 244,
            'startFilePos' => 2794,
            'endTokenPos' => 245,
            'endFilePos' => 2795,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 74,
        'endLine' => 74,
        'startColumn' => 5,
        'endColumn' => 28,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'appends' => 
      array (
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'name' => 'appends',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'original_url\', \'preview_url\']',
          'attributes' => 
          array (
            'startLine' => 76,
            'endLine' => 76,
            'startTokenPos' => 254,
            'startFilePos' => 2824,
            'endTokenPos' => 259,
            'endFilePos' => 2854,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 76,
        'endLine' => 76,
        'startColumn' => 5,
        'endColumn' => 57,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'manipulations\' => \'array\', \'custom_properties\' => \'array\', \'generated_conversions\' => \'array\', \'responsive_images\' => \'array\']',
          'attributes' => 
          array (
            'startLine' => 78,
            'endLine' => 83,
            'startTokenPos' => 268,
            'startFilePos' => 2881,
            'endTokenPos' => 298,
            'endFilePos' => 3047,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 78,
        'endLine' => 83,
        'startColumn' => 5,
        'endColumn' => 6,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'streamChunkSize' => 
      array (
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'name' => 'streamChunkSize',
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
          'code' => '1024 * 1024',
          'attributes' => 
          array (
            'startLine' => 85,
            'endLine' => 85,
            'startTokenPos' => 310,
            'startFilePos' => 3089,
            'endTokenPos' => 314,
            'endFilePos' => 3099,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 85,
        'endLine' => 85,
        'startColumn' => 5,
        'endColumn' => 51,
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
      'newCollection' => 
      array (
        'name' => 'newCollection',
        'parameters' => 
        array (
          'models' => 
          array (
            'name' => 'models',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 87,
                'endLine' => 87,
                'startTokenPos' => 332,
                'startFilePos' => 3180,
                'endTokenPos' => 333,
                'endFilePos' => 3181,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 87,
            'endLine' => 87,
            'startColumn' => 35,
            'endColumn' => 52,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Collections\\MediaCollection',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 87,
        'endLine' => 90,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'model' => 
      array (
        'name' => 'model',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 92,
        'endLine' => 95,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getFullUrl' => 
      array (
        'name' => 'getFullUrl',
        'parameters' => 
        array (
          'conversionName' => 
          array (
            'name' => 'conversionName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 97,
                'endLine' => 97,
                'startTokenPos' => 389,
                'startFilePos' => 3398,
                'endTokenPos' => 389,
                'endFilePos' => 3399,
              ),
            ),
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
            'startLine' => 97,
            'endLine' => 97,
            'startColumn' => 32,
            'endColumn' => 58,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 97,
        'endLine' => 100,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getUrl' => 
      array (
        'name' => 'getUrl',
        'parameters' => 
        array (
          'conversionName' => 
          array (
            'name' => 'conversionName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 102,
                'endLine' => 102,
                'startTokenPos' => 424,
                'startFilePos' => 3527,
                'endTokenPos' => 424,
                'endFilePos' => 3528,
              ),
            ),
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
            'startLine' => 102,
            'endLine' => 102,
            'startColumn' => 28,
            'endColumn' => 54,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 102,
        'endLine' => 107,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getTemporaryUrl' => 
      array (
        'name' => 'getTemporaryUrl',
        'parameters' => 
        array (
          'expiration' => 
          array (
            'name' => 'expiration',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 109,
                'endLine' => 109,
                'startTokenPos' => 471,
                'startFilePos' => 3747,
                'endTokenPos' => 471,
                'endFilePos' => 3750,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionUnionType',
              'data' => 
              array (
                'types' => 
                array (
                  0 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'DateTimeInterface',
                      'isIdentifier' => false,
                    ),
                  ),
                  1 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'null',
                      'isIdentifier' => true,
                    ),
                  ),
                ),
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 109,
            'endLine' => 109,
            'startColumn' => 37,
            'endColumn' => 73,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'conversionName' => 
          array (
            'name' => 'conversionName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 109,
                'endLine' => 109,
                'startTokenPos' => 480,
                'startFilePos' => 3778,
                'endTokenPos' => 480,
                'endFilePos' => 3779,
              ),
            ),
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
            'startLine' => 109,
            'endLine' => 109,
            'startColumn' => 76,
            'endColumn' => 102,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'options' => 
          array (
            'name' => 'options',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 109,
                'endLine' => 109,
                'startTokenPos' => 489,
                'startFilePos' => 3799,
                'endTokenPos' => 490,
                'endFilePos' => 3800,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 109,
            'endLine' => 109,
            'startColumn' => 105,
            'endColumn' => 123,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 109,
        'endLine' => 115,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getPath' => 
      array (
        'name' => 'getPath',
        'parameters' => 
        array (
          'conversionName' => 
          array (
            'name' => 'conversionName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 117,
                'endLine' => 117,
                'startTokenPos' => 559,
                'startFilePos' => 4125,
                'endTokenPos' => 559,
                'endFilePos' => 4126,
              ),
            ),
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
            'startLine' => 117,
            'endLine' => 117,
            'startColumn' => 29,
            'endColumn' => 55,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 117,
        'endLine' => 122,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getPathRelativeToRoot' => 
      array (
        'name' => 'getPathRelativeToRoot',
        'parameters' => 
        array (
          'conversionName' => 
          array (
            'name' => 'conversionName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 124,
                'endLine' => 124,
                'startTokenPos' => 602,
                'startFilePos' => 4324,
                'endTokenPos' => 602,
                'endFilePos' => 4325,
              ),
            ),
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
            'startLine' => 124,
            'endLine' => 124,
            'startColumn' => 43,
            'endColumn' => 69,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 124,
        'endLine' => 127,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getUrlGenerator' => 
      array (
        'name' => 'getUrlGenerator',
        'parameters' => 
        array (
          'conversionName' => 
          array (
            'name' => 'conversionName',
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
            'startLine' => 129,
            'endLine' => 129,
            'startColumn' => 37,
            'endColumn' => 58,
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
            'name' => 'Spatie\\MediaLibrary\\Support\\UrlGenerator\\UrlGenerator',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 129,
        'endLine' => 132,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getAvailableUrl' => 
      array (
        'name' => 'getAvailableUrl',
        'parameters' => 
        array (
          'conversionNames' => 
          array (
            'name' => 'conversionNames',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 134,
            'endLine' => 134,
            'startColumn' => 37,
            'endColumn' => 58,
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
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 134,
        'endLine' => 145,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getDownloadFilename' => 
      array (
        'name' => 'getDownloadFilename',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 147,
        'endLine' => 150,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getAvailableFullUrl' => 
      array (
        'name' => 'getAvailableFullUrl',
        'parameters' => 
        array (
          'conversionNames' => 
          array (
            'name' => 'conversionNames',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 152,
            'endLine' => 152,
            'startColumn' => 41,
            'endColumn' => 62,
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
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 152,
        'endLine' => 163,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getAvailablePath' => 
      array (
        'name' => 'getAvailablePath',
        'parameters' => 
        array (
          'conversionNames' => 
          array (
            'name' => 'conversionNames',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 165,
            'endLine' => 165,
            'startColumn' => 38,
            'endColumn' => 59,
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
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 165,
        'endLine' => 176,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getAvailablePathRelativeToRoot' => 
      array (
        'name' => 'getAvailablePathRelativeToRoot',
        'parameters' => 
        array (
          'conversionNames' => 
          array (
            'name' => 'conversionNames',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 178,
            'endLine' => 178,
            'startColumn' => 52,
            'endColumn' => 73,
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
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 178,
        'endLine' => 189,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'type' => 
      array (
        'name' => 'type',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 191,
        'endLine' => 204,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getTypeFromExtension' => 
      array (
        'name' => 'getTypeFromExtension',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 206,
        'endLine' => 213,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getTypeFromMime' => 
      array (
        'name' => 'getTypeFromMime',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 215,
        'endLine' => 222,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'extension' => 
      array (
        'name' => 'extension',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 224,
        'endLine' => 227,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'humanReadableSize' => 
      array (
        'name' => 'humanReadableSize',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 229,
        'endLine' => 232,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getDiskDriverName' => 
      array (
        'name' => 'getDiskDriverName',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 234,
        'endLine' => 237,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getConversionsDiskDriverName' => 
      array (
        'name' => 'getConversionsDiskDriverName',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 239,
        'endLine' => 244,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'hasCustomProperty' => 
      array (
        'name' => 'hasCustomProperty',
        'parameters' => 
        array (
          'propertyName' => 
          array (
            'name' => 'propertyName',
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
            'startLine' => 246,
            'endLine' => 246,
            'startColumn' => 39,
            'endColumn' => 58,
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
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 246,
        'endLine' => 249,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getCustomProperty' => 
      array (
        'name' => 'getCustomProperty',
        'parameters' => 
        array (
          'propertyName' => 
          array (
            'name' => 'propertyName',
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
            'startLine' => 256,
            'endLine' => 256,
            'startColumn' => 39,
            'endColumn' => 58,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'default' => 
          array (
            'name' => 'default',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 256,
                'endLine' => 256,
                'startTokenPos' => 1344,
                'startFilePos' => 7923,
                'endTokenPos' => 1344,
                'endFilePos' => 7926,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 256,
            'endLine' => 256,
            'startColumn' => 61,
            'endColumn' => 75,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'mixed',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the value of custom property with the given name.
 *
 * @param  mixed  $default
 */',
        'startLine' => 256,
        'endLine' => 259,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'setCustomProperty' => 
      array (
        'name' => 'setCustomProperty',
        'parameters' => 
        array (
          'name' => 
          array (
            'name' => 'name',
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
            'startLine' => 265,
            'endLine' => 265,
            'startColumn' => 39,
            'endColumn' => 50,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'value' => 
          array (
            'name' => 'value',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 265,
            'endLine' => 265,
            'startColumn' => 53,
            'endColumn' => 58,
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
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  mixed  $value
 * @return $this
 */',
        'startLine' => 265,
        'endLine' => 274,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'forgetCustomProperty' => 
      array (
        'name' => 'forgetCustomProperty',
        'parameters' => 
        array (
          'name' => 
          array (
            'name' => 'name',
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
            'startLine' => 279,
            'endLine' => 279,
            'startColumn' => 42,
            'endColumn' => 53,
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
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return $this
 */',
        'startLine' => 279,
        'endLine' => 288,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getMediaConversionNames' => 
      array (
        'name' => 'getMediaConversionNames',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 290,
        'endLine' => 295,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getGeneratedConversions' => 
      array (
        'name' => 'getGeneratedConversions',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Support\\Collection',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 297,
        'endLine' => 300,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'markAsConversionGenerated' => 
      array (
        'name' => 'markAsConversionGenerated',
        'parameters' => 
        array (
          'conversionName' => 
          array (
            'name' => 'conversionName',
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
            'startLine' => 305,
            'endLine' => 305,
            'startColumn' => 47,
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
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return $this
 */',
        'startLine' => 305,
        'endLine' => 316,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'markAsConversionNotGenerated' => 
      array (
        'name' => 'markAsConversionNotGenerated',
        'parameters' => 
        array (
          'conversionName' => 
          array (
            'name' => 'conversionName',
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
            'startLine' => 321,
            'endLine' => 321,
            'startColumn' => 50,
            'endColumn' => 71,
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
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return $this
 */',
        'startLine' => 321,
        'endLine' => 332,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'hasGeneratedConversion' => 
      array (
        'name' => 'hasGeneratedConversion',
        'parameters' => 
        array (
          'conversionName' => 
          array (
            'name' => 'conversionName',
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
            'startLine' => 334,
            'endLine' => 334,
            'startColumn' => 44,
            'endColumn' => 65,
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
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 334,
        'endLine' => 339,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'setStreamChunkSize' => 
      array (
        'name' => 'setStreamChunkSize',
        'parameters' => 
        array (
          'chunkSize' => 
          array (
            'name' => 'chunkSize',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'int',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 344,
            'endLine' => 344,
            'startColumn' => 40,
            'endColumn' => 53,
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
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return $this
 */',
        'startLine' => 344,
        'endLine' => 349,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'toResponse' => 
      array (
        'name' => 'toResponse',
        'parameters' => 
        array (
          'request' => 
          array (
            'name' => 'request',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 351,
            'endLine' => 351,
            'startColumn' => 32,
            'endColumn' => 39,
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
            'name' => 'Symfony\\Component\\HttpFoundation\\StreamedResponse',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 351,
        'endLine' => 354,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'toInlineResponse' => 
      array (
        'name' => 'toInlineResponse',
        'parameters' => 
        array (
          'request' => 
          array (
            'name' => 'request',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 356,
            'endLine' => 356,
            'startColumn' => 38,
            'endColumn' => 45,
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
            'name' => 'Symfony\\Component\\HttpFoundation\\StreamedResponse',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 356,
        'endLine' => 359,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'buildResponse' => 
      array (
        'name' => 'buildResponse',
        'parameters' => 
        array (
          'request' => 
          array (
            'name' => 'request',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 361,
            'endLine' => 361,
            'startColumn' => 36,
            'endColumn' => 43,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'contentDispositionType' => 
          array (
            'name' => 'contentDispositionType',
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
            'startLine' => 361,
            'endLine' => 361,
            'startColumn' => 46,
            'endColumn' => 75,
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
            'name' => 'Symfony\\Component\\HttpFoundation\\StreamedResponse',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 361,
        'endLine' => 385,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getResponsiveImageUrls' => 
      array (
        'name' => 'getResponsiveImageUrls',
        'parameters' => 
        array (
          'conversionName' => 
          array (
            'name' => 'conversionName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 387,
                'endLine' => 387,
                'startTokenPos' => 2034,
                'startFilePos' => 11372,
                'endTokenPos' => 2034,
                'endFilePos' => 11373,
              ),
            ),
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
            'startLine' => 387,
            'endLine' => 387,
            'startColumn' => 44,
            'endColumn' => 70,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 387,
        'endLine' => 390,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'hasResponsiveImages' => 
      array (
        'name' => 'hasResponsiveImages',
        'parameters' => 
        array (
          'conversionName' => 
          array (
            'name' => 'conversionName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 392,
                'endLine' => 392,
                'startTokenPos' => 2070,
                'startFilePos' => 11529,
                'endTokenPos' => 2070,
                'endFilePos' => 11530,
              ),
            ),
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
            'startLine' => 392,
            'endLine' => 392,
            'startColumn' => 41,
            'endColumn' => 67,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 392,
        'endLine' => 395,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'getSrcset' => 
      array (
        'name' => 'getSrcset',
        'parameters' => 
        array (
          'conversionName' => 
          array (
            'name' => 'conversionName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 397,
                'endLine' => 397,
                'startTokenPos' => 2109,
                'startFilePos' => 11681,
                'endTokenPos' => 2109,
                'endFilePos' => 11682,
              ),
            ),
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
            'startLine' => 397,
            'endLine' => 397,
            'startColumn' => 31,
            'endColumn' => 57,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 397,
        'endLine' => 400,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'previewUrl' => 
      array (
        'name' => 'previewUrl',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 402,
        'endLine' => 407,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'originalUrl' => 
      array (
        'name' => 'originalUrl',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Casts\\Attribute',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 409,
        'endLine' => 412,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'move' => 
      array (
        'name' => 'move',
        'parameters' => 
        array (
          'model' => 
          array (
            'name' => 'model',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Spatie\\MediaLibrary\\HasMedia',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 415,
            'endLine' => 415,
            'startColumn' => 26,
            'endColumn' => 40,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'collectionName' => 
          array (
            'name' => 'collectionName',
            'default' => 
            array (
              'code' => '\'default\'',
              'attributes' => 
              array (
                'startLine' => 415,
                'endLine' => 415,
                'startTokenPos' => 2239,
                'startFilePos' => 12194,
                'endTokenPos' => 2239,
                'endFilePos' => 12202,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 415,
            'endLine' => 415,
            'startColumn' => 43,
            'endColumn' => 69,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'diskName' => 
          array (
            'name' => 'diskName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 415,
                'endLine' => 415,
                'startTokenPos' => 2248,
                'startFilePos' => 12224,
                'endTokenPos' => 2248,
                'endFilePos' => 12225,
              ),
            ),
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
            'startLine' => 415,
            'endLine' => 415,
            'startColumn' => 72,
            'endColumn' => 92,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
          'fileName' => 
          array (
            'name' => 'fileName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 415,
                'endLine' => 415,
                'startTokenPos' => 2257,
                'startFilePos' => 12247,
                'endTokenPos' => 2257,
                'endFilePos' => 12248,
              ),
            ),
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
            'startLine' => 415,
            'endLine' => 415,
            'startColumn' => 95,
            'endColumn' => 115,
            'parameterIndex' => 3,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/** @param  string  $collectionName */',
        'startLine' => 415,
        'endLine' => 422,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'copy' => 
      array (
        'name' => 'copy',
        'parameters' => 
        array (
          'model' => 
          array (
            'name' => 'model',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Spatie\\MediaLibrary\\HasMedia',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 428,
            'endLine' => 428,
            'startColumn' => 9,
            'endColumn' => 23,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'collectionName' => 
          array (
            'name' => 'collectionName',
            'default' => 
            array (
              'code' => '\'default\'',
              'attributes' => 
              array (
                'startLine' => 429,
                'endLine' => 429,
                'startTokenPos' => 2320,
                'startFilePos' => 12578,
                'endTokenPos' => 2320,
                'endFilePos' => 12586,
              ),
            ),
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
            'startLine' => 429,
            'endLine' => 429,
            'startColumn' => 9,
            'endColumn' => 42,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'diskName' => 
          array (
            'name' => 'diskName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 430,
                'endLine' => 430,
                'startTokenPos' => 2329,
                'startFilePos' => 12616,
                'endTokenPos' => 2329,
                'endFilePos' => 12617,
              ),
            ),
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
            'startLine' => 430,
            'endLine' => 430,
            'startColumn' => 9,
            'endColumn' => 29,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
          'fileName' => 
          array (
            'name' => 'fileName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 431,
                'endLine' => 431,
                'startTokenPos' => 2338,
                'startFilePos' => 12647,
                'endTokenPos' => 2338,
                'endFilePos' => 12648,
              ),
            ),
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
            'startLine' => 431,
            'endLine' => 431,
            'startColumn' => 9,
            'endColumn' => 29,
            'parameterIndex' => 3,
            'isOptional' => true,
          ),
          'fileAdderCallback' => 
          array (
            'name' => 'fileAdderCallback',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 432,
                'endLine' => 432,
                'startTokenPos' => 2348,
                'startFilePos' => 12689,
                'endTokenPos' => 2348,
                'endFilePos' => 12692,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionUnionType',
              'data' => 
              array (
                'types' => 
                array (
                  0 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'Closure',
                      'isIdentifier' => false,
                    ),
                  ),
                  1 => 
                  array (
                    'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
                    'data' => 
                    array (
                      'name' => 'null',
                      'isIdentifier' => true,
                    ),
                  ),
                ),
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 432,
            'endLine' => 432,
            'startColumn' => 9,
            'endColumn' => 42,
            'parameterIndex' => 4,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param  null|Closure(FileAdder): FileAdder  $fileAdderCallback
 */',
        'startLine' => 427,
        'endLine' => 463,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'responsiveImages' => 
      array (
        'name' => 'responsiveImages',
        'parameters' => 
        array (
          'conversionName' => 
          array (
            'name' => 'conversionName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 465,
                'endLine' => 465,
                'startTokenPos' => 2543,
                'startFilePos' => 13715,
                'endTokenPos' => 2543,
                'endFilePos' => 13716,
              ),
            ),
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
            'startLine' => 465,
            'endLine' => 465,
            'startColumn' => 38,
            'endColumn' => 64,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Spatie\\MediaLibrary\\ResponsiveImages\\RegisteredResponsiveImages',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 465,
        'endLine' => 468,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'stream' => 
      array (
        'name' => 'stream',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 470,
        'endLine' => 476,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'toHtml' => 
      array (
        'name' => 'toHtml',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 478,
        'endLine' => 481,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'img' => 
      array (
        'name' => 'img',
        'parameters' => 
        array (
          'conversionName' => 
          array (
            'name' => 'conversionName',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 483,
                'endLine' => 483,
                'startTokenPos' => 2642,
                'startFilePos' => 14147,
                'endTokenPos' => 2642,
                'endFilePos' => 14148,
              ),
            ),
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
            'startLine' => 483,
            'endLine' => 483,
            'startColumn' => 25,
            'endColumn' => 51,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'extraAttributes' => 
          array (
            'name' => 'extraAttributes',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 483,
                'endLine' => 483,
                'startTokenPos' => 2649,
                'startFilePos' => 14170,
                'endTokenPos' => 2650,
                'endFilePos' => 14171,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 483,
            'endLine' => 483,
            'startColumn' => 54,
            'endColumn' => 74,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Spatie\\MediaLibrary\\MediaCollections\\HtmlableMedia',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 483,
        'endLine' => 488,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      '__invoke' => 
      array (
        'name' => '__invoke',
        'parameters' => 
        array (
          'arguments' => 
          array (
            'name' => 'arguments',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => true,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 490,
            'endLine' => 490,
            'startColumn' => 30,
            'endColumn' => 42,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Spatie\\MediaLibrary\\MediaCollections\\HtmlableMedia',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 490,
        'endLine' => 493,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => true,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'temporaryUpload' => 
      array (
        'name' => 'temporaryUpload',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 495,
        'endLine' => 503,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'findWithTemporaryUploadInCurrentSession' => 
      array (
        'name' => 'findWithTemporaryUploadInCurrentSession',
        'parameters' => 
        array (
          'uuids' => 
          array (
            'name' => 'uuids',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 505,
            'endLine' => 505,
            'startColumn' => 68,
            'endColumn' => 79,
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
            'name' => 'Illuminate\\Database\\Eloquent\\Collection',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 505,
        'endLine' => 520,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'mailAttachment' => 
      array (
        'name' => 'mailAttachment',
        'parameters' => 
        array (
          'conversion' => 
          array (
            'name' => 'conversion',
            'default' => 
            array (
              'code' => '\'\'',
              'attributes' => 
              array (
                'startLine' => 522,
                'endLine' => 522,
                'startTokenPos' => 2870,
                'startFilePos' => 15448,
                'endTokenPos' => 2870,
                'endFilePos' => 15449,
              ),
            ),
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
            'startLine' => 522,
            'endLine' => 522,
            'startColumn' => 36,
            'endColumn' => 58,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Mail\\Attachment',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 522,
        'endLine' => 531,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'toMailAttachment' => 
      array (
        'name' => 'toMailAttachment',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Mail\\Attachment',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 533,
        'endLine' => 536,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'aliasName' => NULL,
      ),
      'saveOrTouch' => 
      array (
        'name' => 'saveOrTouch',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 538,
        'endLine' => 545,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Spatie\\MediaLibrary\\MediaCollections\\Models',
        'declaringClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'implementingClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
        'currentClassName' => 'Spatie\\MediaLibrary\\MediaCollections\\Models\\Media',
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