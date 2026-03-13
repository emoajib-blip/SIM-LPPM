<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/AdditionalOutput.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\AdditionalOutput
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-19d04f566a4f8be5298cee9242b34120140e9076dd2ad7ded6de0d2214e5168e',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\AdditionalOutput',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/AdditionalOutput.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\AdditionalOutput',
    'shortName' => 'AdditionalOutput',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property string $id
 * @property string $progress_report_id
 * @property string $proposal_output_id
 * @property string|null $status
 * @property string|null $book_title
 * @property string|null $publisher_name
 * @property string|null $isbn
 * @property int|null $publication_year
 * @property int|null $total_pages
 * @property string|null $publisher_url
 * @property string|null $book_url
 * @property string|null $document_file
 * @property string|null $publication_certificate
 * @property string|null $journal_title
 * @property string|null $issn
 * @property string|null $eissn
 * @property string|null $indexing_body
 * @property string|null $volume
 * @property string|null $issue_number
 * @property string|null $doi
 * @property string|null $hki_type
 * @property string|null $registration_number
 * @property string|null $inventors
 * @property string|null $product_name
 * @property string|null $description
 * @property string|null $readiness_level
 * @property string|null $implementation_location
 * @property string|null $media_name
 * @property string|null $media_url
 * @property \\Illuminate\\Support\\Carbon|null $publication_date
 * @property string|null $video_url
 * @property string|null $platform
 * @property bool $is_verified
 * @property \\Illuminate\\Support\\Carbon|null $verified_at
 * @property string|null $verified_by
 * @property string|null $rank
 * @property-read \\App\\Models\\ProgressReport $progressReport
 * @property-read \\App\\Models\\ProposalOutput $proposalOutput
 *
 * Virtual properties used in IKU Verification
 * @property string $model_type
 * @property bool $is_verified_status
 * @property string|null $display_title
 * @property string $submitter_name
 * @property string|null $document_url
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 60,
    'endLine' => 152,
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
        'declaringClassName' => 'App\\Models\\AdditionalOutput',
        'implementingClassName' => 'App\\Models\\AdditionalOutput',
        'name' => 'keyType',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '\'string\'',
          'attributes' => 
          array (
            'startLine' => 68,
            'endLine' => 68,
            'startTokenPos' => 76,
            'startFilePos' => 2407,
            'endTokenPos' => 76,
            'endFilePos' => 2414,
          ),
        ),
        'docComment' => '/**
 * The type of the auto-incrementing ID\'s primary key.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 68,
        'endLine' => 68,
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
        'declaringClassName' => 'App\\Models\\AdditionalOutput',
        'implementingClassName' => 'App\\Models\\AdditionalOutput',
        'name' => 'incrementing',
        'modifiers' => 1,
        'type' => NULL,
        'default' => 
        array (
          'code' => 'false',
          'attributes' => 
          array (
            'startLine' => 73,
            'endLine' => 73,
            'startTokenPos' => 87,
            'startFilePos' => 2510,
            'endTokenPos' => 87,
            'endFilePos' => 2514,
          ),
        ),
        'docComment' => '/**
 * Indicates if the ID is auto-incrementing.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 73,
        'endLine' => 73,
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
        'declaringClassName' => 'App\\Models\\AdditionalOutput',
        'implementingClassName' => 'App\\Models\\AdditionalOutput',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[
    \'progress_report_id\',
    \'proposal_output_id\',
    \'status\',
    \'book_title\',
    \'publisher_name\',
    \'isbn\',
    \'publication_year\',
    \'total_pages\',
    \'publisher_url\',
    \'book_url\',
    \'document_file\',
    \'publication_certificate\',
    // New fields
    \'journal_title\',
    \'issn\',
    \'eissn\',
    \'indexing_body\',
    \'volume\',
    \'issue_number\',
    \'doi\',
    \'hki_type\',
    \'registration_number\',
    \'inventors\',
    \'product_name\',
    \'description\',
    \'readiness_level\',
    \'implementation_location\',
    \'media_name\',
    \'media_url\',
    \'publication_date\',
    \'video_url\',
    \'platform\',
    \'is_verified\',
    \'verified_at\',
    \'verified_by\',
    \'rank\',
]',
          'attributes' => 
          array (
            'startLine' => 75,
            'endLine' => 112,
            'startTokenPos' => 96,
            'startFilePos' => 2544,
            'endTokenPos' => 207,
            'endFilePos' => 3405,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 75,
        'endLine' => 112,
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
        'startLine' => 114,
        'endLine' => 121,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\AdditionalOutput',
        'implementingClassName' => 'App\\Models\\AdditionalOutput',
        'currentClassName' => 'App\\Models\\AdditionalOutput',
        'aliasName' => NULL,
      ),
      'progressReport' => 
      array (
        'name' => 'progressReport',
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
 * Get the progress report that owns the additional output.
 */',
        'startLine' => 126,
        'endLine' => 129,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\AdditionalOutput',
        'implementingClassName' => 'App\\Models\\AdditionalOutput',
        'currentClassName' => 'App\\Models\\AdditionalOutput',
        'aliasName' => NULL,
      ),
      'proposalOutput' => 
      array (
        'name' => 'proposalOutput',
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
 * Get the proposal output that this additional output is based on.
 */',
        'startLine' => 134,
        'endLine' => 137,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\AdditionalOutput',
        'implementingClassName' => 'App\\Models\\AdditionalOutput',
        'currentClassName' => 'App\\Models\\AdditionalOutput',
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
        'startLine' => 142,
        'endLine' => 151,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\AdditionalOutput',
        'implementingClassName' => 'App\\Models\\AdditionalOutput',
        'currentClassName' => 'App\\Models\\AdditionalOutput',
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