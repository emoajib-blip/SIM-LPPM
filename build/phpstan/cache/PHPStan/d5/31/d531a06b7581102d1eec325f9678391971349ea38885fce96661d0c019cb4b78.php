<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/Institution.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Institution
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-262e813e581f29244a05069590dcab589ced069ba605cc4cc51ed0c2a441a63b',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Institution',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/Institution.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Institution',
    'shortName' => 'Institution',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string $name
 * @property string|null $short_name
 * @property string|null $code
 * @property string|null $type
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $website
 * @property string|null $lppm_head_name
 * @property string|null $lppm_head_id
 * @property string|null $lppm_head_user_id
 * @property bool $is_verified
 * @property-read \\App\\Models\\User|null $lppmHeadUser
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\Faculty[] $faculties
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\StudyProgram[] $studyPrograms
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\Identity[] $identities
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 29,
    'endLine' => 81,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Models\\Institution',
        'implementingClassName' => 'App\\Models\\Institution',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'name\', \'short_name\', \'code\', \'type\', \'address\', \'phone\', \'email\', \'website\', \'lppm_head_name\', \'lppm_head_id\', \'lppm_head_user_id\', \'is_verified\']',
          'attributes' => 
          array (
            'startLine' => 34,
            'endLine' => 47,
            'startTokenPos' => 52,
            'startFilePos' => 1167,
            'endTokenPos' => 90,
            'endFilePos' => 1417,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 34,
        'endLine' => 47,
        'startColumn' => 5,
        'endColumn' => 6,
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
      'lppmHeadUser' => 
      array (
        'name' => 'lppmHeadUser',
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
        'docComment' => '/**
 * Get the user who is the head of LPPM for this institution.
 */',
        'startLine' => 53,
        'endLine' => 56,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Institution',
        'implementingClassName' => 'App\\Models\\Institution',
        'currentClassName' => 'App\\Models\\Institution',
        'aliasName' => NULL,
      ),
      'faculties' => 
      array (
        'name' => 'faculties',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get all faculties for the institution.
 */',
        'startLine' => 61,
        'endLine' => 64,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Institution',
        'implementingClassName' => 'App\\Models\\Institution',
        'currentClassName' => 'App\\Models\\Institution',
        'aliasName' => NULL,
      ),
      'studyPrograms' => 
      array (
        'name' => 'studyPrograms',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\HasManyThrough',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get all study programs for the institution (through faculties).
 */',
        'startLine' => 69,
        'endLine' => 72,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Institution',
        'implementingClassName' => 'App\\Models\\Institution',
        'currentClassName' => 'App\\Models\\Institution',
        'aliasName' => NULL,
      ),
      'identities' => 
      array (
        'name' => 'identities',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get all identities associated with the institution.
 */',
        'startLine' => 77,
        'endLine' => 80,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Institution',
        'implementingClassName' => 'App\\Models\\Institution',
        'currentClassName' => 'App\\Models\\Institution',
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