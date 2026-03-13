<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/MandatoryOutput.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\MandatoryOutput
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-a13df2915e159215d1623952979d2a6e7a4cb58bc61871bf38814e3863bf5c67',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\MandatoryOutput',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/MandatoryOutput.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\MandatoryOutput',
    'shortName' => 'MandatoryOutput',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property string $id
 * @property string $progress_report_id
 * @property string $proposal_output_id
 * @property string|null $status_type
 * @property string|null $author_status
 * @property string|null $journal_title
 * @property string|null $issn
 * @property string|null $eissn
 * @property string|null $indexing_body
 * @property string|null $journal_url
 * @property string|null $article_title
 * @property int|null $publication_year
 * @property string|null $volume
 * @property string|null $issue_number
 * @property string|null $page_start
 * @property string|null $page_end
 * @property string|null $article_url
 * @property string|null $doi
 * @property string|null $document_file
 * @property string|null $book_title
 * @property string|null $isbn
 * @property string|null $authors
 * @property string|null $publisher
 * @property int|null $total_pages
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
    'startLine' => 64,
    'endLine' => 156,
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
        'declaringClassName' => 'App\\Models\\MandatoryOutput',
        'implementingClassName' => 'App\\Models\\MandatoryOutput',
        'name' => 'keyType',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '\'string\'',
          'attributes' => 
          array (
            'startLine' => 72,
            'endLine' => 72,
            'startTokenPos' => 76,
            'startFilePos' => 2542,
            'endTokenPos' => 76,
            'endFilePos' => 2549,
          ),
        ),
        'docComment' => '/**
 * The type of the auto-incrementing ID\'s primary key.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 72,
        'endLine' => 72,
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
        'declaringClassName' => 'App\\Models\\MandatoryOutput',
        'implementingClassName' => 'App\\Models\\MandatoryOutput',
        'name' => 'incrementing',
        'modifiers' => 1,
        'type' => NULL,
        'default' => 
        array (
          'code' => 'false',
          'attributes' => 
          array (
            'startLine' => 77,
            'endLine' => 77,
            'startTokenPos' => 87,
            'startFilePos' => 2645,
            'endTokenPos' => 87,
            'endFilePos' => 2649,
          ),
        ),
        'docComment' => '/**
 * Indicates if the ID is auto-incrementing.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 77,
        'endLine' => 77,
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
        'declaringClassName' => 'App\\Models\\MandatoryOutput',
        'implementingClassName' => 'App\\Models\\MandatoryOutput',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[
    \'progress_report_id\',
    \'proposal_output_id\',
    \'status_type\',
    \'author_status\',
    \'journal_title\',
    \'issn\',
    \'eissn\',
    \'indexing_body\',
    \'journal_url\',
    \'article_title\',
    \'publication_year\',
    \'volume\',
    \'issue_number\',
    \'page_start\',
    \'page_end\',
    \'article_url\',
    \'doi\',
    \'document_file\',
    // New fields
    \'book_title\',
    \'isbn\',
    \'authors\',
    \'publisher\',
    \'total_pages\',
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
            'startLine' => 79,
            'endLine' => 120,
            'startTokenPos' => 96,
            'startFilePos' => 2679,
            'endTokenPos' => 217,
            'endFilePos' => 3600,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 79,
        'endLine' => 120,
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
        'startLine' => 122,
        'endLine' => 129,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\MandatoryOutput',
        'implementingClassName' => 'App\\Models\\MandatoryOutput',
        'currentClassName' => 'App\\Models\\MandatoryOutput',
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
 * Get the progress report that owns the mandatory output.
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
        'declaringClassName' => 'App\\Models\\MandatoryOutput',
        'implementingClassName' => 'App\\Models\\MandatoryOutput',
        'currentClassName' => 'App\\Models\\MandatoryOutput',
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
 * Get the proposal output that this mandatory output is based on.
 */',
        'startLine' => 142,
        'endLine' => 145,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\MandatoryOutput',
        'implementingClassName' => 'App\\Models\\MandatoryOutput',
        'currentClassName' => 'App\\Models\\MandatoryOutput',
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
        'startLine' => 150,
        'endLine' => 155,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\MandatoryOutput',
        'implementingClassName' => 'App\\Models\\MandatoryOutput',
        'currentClassName' => 'App\\Models\\MandatoryOutput',
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