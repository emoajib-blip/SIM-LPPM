<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/ProposalMonev.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\ProposalMonev
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-08c24d11882446702546093a7a9bb9c82a6b4688c13a6217dae1ecdf6a67ccce',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\ProposalMonev',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/ProposalMonev.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\ProposalMonev',
    'shortName' => 'ProposalMonev',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property string $id
 * @property string $proposal_id
 * @property \\Illuminate\\Support\\Carbon $monev_date
 * @property int $progress_percentage
 * @property string|null $notes
 * @property-read \\App\\Models\\Proposal $proposal
 *
 * "Efficiency is the goal, but Integrity is the foundation."
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 23,
    'endLine' => 74,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
    'implementsClassNames' => 
    array (
      0 => 'Spatie\\MediaLibrary\\HasMedia',
    ),
    'traitClassNames' => 
    array (
      0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      1 => 'Illuminate\\Database\\Eloquent\\Concerns\\HasUuids',
      2 => 'Spatie\\MediaLibrary\\InteractsWithMedia',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Models\\ProposalMonev',
        'implementingClassName' => 'App\\Models\\ProposalMonev',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'proposal_id\', \'monev_date\', \'progress_percentage\', \'notes\', \'academic_year\', \'semester\']',
          'attributes' => 
          array (
            'startLine' => 27,
            'endLine' => 34,
            'startTokenPos' => 70,
            'startFilePos' => 812,
            'endTokenPos' => 90,
            'endFilePos' => 956,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 27,
        'endLine' => 34,
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
      'casts' => 
      array (
        'name' => 'casts',
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
        'startLine' => 36,
        'endLine' => 41,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProposalMonev',
        'implementingClassName' => 'App\\Models\\ProposalMonev',
        'currentClassName' => 'App\\Models\\ProposalMonev',
        'aliasName' => NULL,
      ),
      'proposal' => 
      array (
        'name' => 'proposal',
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
        'startLine' => 43,
        'endLine' => 46,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProposalMonev',
        'implementingClassName' => 'App\\Models\\ProposalMonev',
        'currentClassName' => 'App\\Models\\ProposalMonev',
        'aliasName' => NULL,
      ),
      'registerMediaCollections' => 
      array (
        'name' => 'registerMediaCollections',
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
        'startLine' => 48,
        'endLine' => 73,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProposalMonev',
        'implementingClassName' => 'App\\Models\\ProposalMonev',
        'currentClassName' => 'App\\Models\\ProposalMonev',
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