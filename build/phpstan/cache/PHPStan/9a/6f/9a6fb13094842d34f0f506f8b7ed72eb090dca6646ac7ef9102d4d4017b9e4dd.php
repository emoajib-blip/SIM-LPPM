<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/ProgressReport.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\ProgressReport
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-31ad15f0ebe325e93d3cbb2011611a03eadf639427f6f2504d1ea34e731756c6',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\ProgressReport',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/ProgressReport.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\ProgressReport',
    'shortName' => 'ProgressReport',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property string $id
 * @property string $proposal_id
 * @property string|null $summary_update
 * @property int|null $reporting_year
 * @property string|null $reporting_period
 * @property string|null $status
 * @property string|null $submitted_by
 * @property \\Illuminate\\Support\\Carbon|null $submitted_at
 * @property-read \\App\\Models\\Proposal $proposal
 * @property-read \\App\\Models\\User|null $submitter
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\Keyword[] $keywords
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\MandatoryOutput[] $mandatoryOutputs
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\AdditionalOutput[] $additionalOutputs
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 30,
    'endLine' => 166,
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
      'keyType' => 
      array (
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'name' => 'keyType',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '\'string\'',
          'attributes' => 
          array (
            'startLine' => 38,
            'endLine' => 38,
            'startTokenPos' => 89,
            'startFilePos' => 1477,
            'endTokenPos' => 89,
            'endFilePos' => 1484,
          ),
        ),
        'docComment' => '/**
 * The type of the auto-incrementing ID\'s primary key.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 38,
        'endLine' => 38,
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
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'name' => 'incrementing',
        'modifiers' => 1,
        'type' => NULL,
        'default' => 
        array (
          'code' => 'false',
          'attributes' => 
          array (
            'startLine' => 43,
            'endLine' => 43,
            'startTokenPos' => 100,
            'startFilePos' => 1580,
            'endTokenPos' => 100,
            'endFilePos' => 1584,
          ),
        ),
        'docComment' => '/**
 * Indicates if the ID is auto-incrementing.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 43,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 33,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'fillable' => 
      array (
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'proposal_id\', \'summary_update\', \'reporting_year\', \'reporting_period\', \'status\', \'submitted_by\', \'submitted_at\']',
          'attributes' => 
          array (
            'startLine' => 45,
            'endLine' => 53,
            'startTokenPos' => 109,
            'startFilePos' => 1614,
            'endTokenPos' => 132,
            'endFilePos' => 1789,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 45,
        'endLine' => 53,
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
        'docComment' => '/**
 * Get the attributes that should be cast.
 *
 * @return array<string, string>
 */',
        'startLine' => 60,
        'endLine' => 66,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'currentClassName' => 'App\\Models\\ProgressReport',
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
        'docComment' => '/**
 * Get the proposal that owns the progress report.
 */',
        'startLine' => 71,
        'endLine' => 74,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'currentClassName' => 'App\\Models\\ProgressReport',
        'aliasName' => NULL,
      ),
      'submitter' => 
      array (
        'name' => 'submitter',
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
 * Get the user who submitted the report.
 */',
        'startLine' => 79,
        'endLine' => 82,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'currentClassName' => 'App\\Models\\ProgressReport',
        'aliasName' => NULL,
      ),
      'keywords' => 
      array (
        'name' => 'keywords',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get all keywords for the progress report.
 */',
        'startLine' => 87,
        'endLine' => 91,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'currentClassName' => 'App\\Models\\ProgressReport',
        'aliasName' => NULL,
      ),
      'mandatoryOutputs' => 
      array (
        'name' => 'mandatoryOutputs',
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
 * Get all mandatory outputs for the progress report.
 */',
        'startLine' => 96,
        'endLine' => 99,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'currentClassName' => 'App\\Models\\ProgressReport',
        'aliasName' => NULL,
      ),
      'additionalOutputs' => 
      array (
        'name' => 'additionalOutputs',
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
 * Get all additional outputs for the progress report.
 */',
        'startLine' => 104,
        'endLine' => 107,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'currentClassName' => 'App\\Models\\ProgressReport',
        'aliasName' => NULL,
      ),
      'signatures' => 
      array (
        'name' => 'signatures',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get all digital signatures for the report.
 */',
        'startLine' => 112,
        'endLine' => 115,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'currentClassName' => 'App\\Models\\ProgressReport',
        'aliasName' => NULL,
      ),
      'isFinalReport' => 
      array (
        'name' => 'isFinalReport',
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
        'docComment' => '/**
 * Check if this is a final report.
 */',
        'startLine' => 120,
        'endLine' => 123,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'currentClassName' => 'App\\Models\\ProgressReport',
        'aliasName' => NULL,
      ),
      'scopeFinalReports' => 
      array (
        'name' => 'scopeFinalReports',
        'parameters' => 
        array (
          'query' => 
          array (
            'name' => 'query',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 128,
            'endLine' => 128,
            'startColumn' => 39,
            'endColumn' => 44,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Scope a query to only include final reports.
 */',
        'startLine' => 128,
        'endLine' => 131,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'currentClassName' => 'App\\Models\\ProgressReport',
        'aliasName' => NULL,
      ),
      'scopeProgressReports' => 
      array (
        'name' => 'scopeProgressReports',
        'parameters' => 
        array (
          'query' => 
          array (
            'name' => 'query',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 136,
            'endLine' => 136,
            'startColumn' => 42,
            'endColumn' => 47,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Scope a query to only include progress reports (exclude final).
 */',
        'startLine' => 136,
        'endLine' => 139,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'currentClassName' => 'App\\Models\\ProgressReport',
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
        'docComment' => '/**
 * Register media collections for this model.
 */',
        'startLine' => 144,
        'endLine' => 165,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\ProgressReport',
        'implementingClassName' => 'App\\Models\\ProgressReport',
        'currentClassName' => 'App\\Models\\ProgressReport',
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