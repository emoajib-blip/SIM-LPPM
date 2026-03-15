<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/MonevReview.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\MonevReview
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-93d5a882718bd62c2d5b6c6ba9b0c781994ad74222bdd8eabe91d42e64cbdcd3',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\MonevReview',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/MonevReview.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\MonevReview',
    'shortName' => 'MonevReview',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property string $id
 * @property string $proposal_id
 * @property string $reviewer_id
 * @property float $score
 * @property string|null $status
 * @property string|null $notes
 * @property array|null $borang_data
 * @property string $academic_year
 * @property string $semester
 * @property \\Illuminate\\Support\\Carbon|null $reviewed_at
 * @property \\Illuminate\\Support\\Carbon|null $finalized_by_lppm_at
 * @property string|null $finalized_by_lppm_by
 * @property \\Illuminate\\Support\\Carbon|null $approved_by_kepala_at
 * @property string|null $approved_by_kepala_by
 * @property \\Illuminate\\Support\\Carbon|null $reported_to_rektor_at
 * @property-read \\App\\Models\\Proposal $proposal
 * @property-read \\App\\Models\\User $reviewer
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\DocumentSignature[] $signatures
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 33,
    'endLine' => 92,
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
        'declaringClassName' => 'App\\Models\\MonevReview',
        'implementingClassName' => 'App\\Models\\MonevReview',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'proposal_id\', \'reviewer_id\', \'score\', \'status\', \'notes\', \'borang_data\', \'academic_year\', \'semester\', \'reviewed_at\', \'finalized_by_lppm_at\', \'finalized_by_lppm_by\', \'approved_by_kepala_at\', \'approved_by_kepala_by\', \'reported_to_rektor_at\']',
          'attributes' => 
          array (
            'startLine' => 37,
            'endLine' => 52,
            'startTokenPos' => 75,
            'startFilePos' => 1339,
            'endTokenPos' => 119,
            'endFilePos' => 1697,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 37,
        'endLine' => 52,
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
 */',
        'startLine' => 57,
        'endLine' => 67,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\MonevReview',
        'implementingClassName' => 'App\\Models\\MonevReview',
        'currentClassName' => 'App\\Models\\MonevReview',
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
 * Get the proposal being reviewed.
 */',
        'startLine' => 72,
        'endLine' => 75,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\MonevReview',
        'implementingClassName' => 'App\\Models\\MonevReview',
        'currentClassName' => 'App\\Models\\MonevReview',
        'aliasName' => NULL,
      ),
      'reviewer' => 
      array (
        'name' => 'reviewer',
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
 * Get the reviewer user.
 */',
        'startLine' => 80,
        'endLine' => 83,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\MonevReview',
        'implementingClassName' => 'App\\Models\\MonevReview',
        'currentClassName' => 'App\\Models\\MonevReview',
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
 * Get all digital signatures for the monev review.
 */',
        'startLine' => 88,
        'endLine' => 91,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\MonevReview',
        'implementingClassName' => 'App\\Models\\MonevReview',
        'currentClassName' => 'App\\Models\\MonevReview',
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