<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/DocumentSignature.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\DocumentSignature
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-c06e79276a446f30bbf335ce5e55620c70606b11b7d7d3867ff47a4216c86296',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\DocumentSignature',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/DocumentSignature.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\DocumentSignature',
    'shortName' => 'DocumentSignature',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 9,
    'endLine' => 42,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Illuminate\\Database\\Eloquent\\Concerns\\HasUuids',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Models\\DocumentSignature',
        'implementingClassName' => 'App\\Models\\DocumentSignature',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'id\', \'document_type\', \'document_id\', \'variant\', \'action\', \'signed_role\', \'signed_by\', \'signed_at\', \'hash_alg\', \'document_hash\', \'kid\', \'signature\', \'payload\']',
          'attributes' => 
          array (
            'startLine' => 13,
            'endLine' => 27,
            'startTokenPos' => 43,
            'startFilePos' => 260,
            'endTokenPos' => 84,
            'endFilePos' => 530,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 13,
        'endLine' => 27,
        'startColumn' => 5,
        'endColumn' => 6,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'casts' => 
      array (
        'declaringClassName' => 'App\\Models\\DocumentSignature',
        'implementingClassName' => 'App\\Models\\DocumentSignature',
        'name' => 'casts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'payload\' => \'array\', \'signed_at\' => \'datetime\']',
          'attributes' => 
          array (
            'startLine' => 29,
            'endLine' => 32,
            'startTokenPos' => 93,
            'startFilePos' => 557,
            'endTokenPos' => 109,
            'endFilePos' => 628,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 29,
        'endLine' => 32,
        'startColumn' => 5,
        'endColumn' => 6,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'keyType' => 
      array (
        'declaringClassName' => 'App\\Models\\DocumentSignature',
        'implementingClassName' => 'App\\Models\\DocumentSignature',
        'name' => 'keyType',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '\'string\'',
          'attributes' => 
          array (
            'startLine' => 34,
            'endLine' => 34,
            'startTokenPos' => 118,
            'startFilePos' => 657,
            'endTokenPos' => 118,
            'endFilePos' => 664,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 34,
        'endLine' => 34,
        'startColumn' => 5,
        'endColumn' => 34,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'incrementing' => 
      array (
        'declaringClassName' => 'App\\Models\\DocumentSignature',
        'implementingClassName' => 'App\\Models\\DocumentSignature',
        'name' => 'incrementing',
        'modifiers' => 1,
        'type' => NULL,
        'default' => 
        array (
          'code' => 'false',
          'attributes' => 
          array (
            'startLine' => 36,
            'endLine' => 36,
            'startTokenPos' => 127,
            'startFilePos' => 695,
            'endTokenPos' => 127,
            'endFilePos' => 699,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 36,
        'endLine' => 36,
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
      'document' => 
      array (
        'name' => 'document',
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
        'startLine' => 38,
        'endLine' => 41,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\DocumentSignature',
        'implementingClassName' => 'App\\Models\\DocumentSignature',
        'currentClassName' => 'App\\Models\\DocumentSignature',
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