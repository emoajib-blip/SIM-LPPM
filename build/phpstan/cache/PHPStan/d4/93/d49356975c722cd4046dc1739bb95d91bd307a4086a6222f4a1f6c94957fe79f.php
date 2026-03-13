<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/Identity.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Identity
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-f313078d73f890adbca04ac65a20d5216fc91df0a24153d0a1e96fa15955e20a',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Identity',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/Identity.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Identity',
    'shortName' => 'Identity',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property int $id
 * @property string|null $identity_id
 * @property string $user_id
 * @property string|null $sinta_id
 * @property string|null $scopus_id
 * @property string|null $google_scholar_id
 * @property string|null $wos_id
 * @property string|null $type
 * @property string|null $address
 * @property \\Illuminate\\Support\\Carbon|null $birthdate
 * @property string|null $birthplace
 * @property int|null $institution_id
 * @property string|null $institution_name
 * @property int|null $study_program_id
 * @property int|null $faculty_id
 * @property string|null $profile_picture
 * @property string|null $last_education
 * @property string|null $functional_position
 * @property string|null $title_prefix
 * @property string|null $title_suffix
 * @property float|null $sinta_score_v2_overall
 * @property float|null $sinta_score_v2_3yr
 * @property float|null $sinta_score_v3_overall
 * @property float|null $sinta_score_v3_3yr
 * @property float|null $affil_score_v3_overall
 * @property float|null $affil_score_v3_3yr
 * @property int|null $scopus_documents
 * @property int|null $scopus_citations
 * @property int|null $scopus_cited_documents
 * @property int|null $scopus_h_index
 * @property int|null $scopus_g_index
 * @property int|null $scopus_i10_index
 * @property int|null $gs_documents
 * @property int|null $gs_citations
 * @property int|null $gs_cited_documents
 * @property int|null $gs_h_index
 * @property int|null $gs_g_index
 * @property int|null $gs_i10_index
 * @property int|null $wos_documents
 * @property int|null $wos_citations
 * @property int|null $wos_cited_documents
 * @property int|null $wos_h_index
 * @property int|null $wos_g_index
 * @property int|null $wos_i10_index
 * @property int|null $garuda_documents
 * @property int|null $garuda_citations
 * @property int|null $garuda_cited_documents
 * @property bool $is_active
 * @property-read \\App\\Models\\User $user
 * @property-read \\App\\Models\\Institution|null $institution
 * @property-read \\App\\Models\\StudyProgram|null $studyProgram
 * @property-read \\App\\Models\\Faculty|null $faculty
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 63,
    'endLine' => 233,
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
        'declaringClassName' => 'App\\Models\\Identity',
        'implementingClassName' => 'App\\Models\\Identity',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[
    \'identity_id\',
    \'user_id\',
    \'sinta_id\',
    \'scopus_id\',
    \'google_scholar_id\',
    \'wos_id\',
    \'type\',
    \'address\',
    \'birthdate\',
    \'birthplace\',
    \'institution_id\',
    \'institution_name\',
    \'study_program_id\',
    \'faculty_id\',
    \'profile_picture\',
    // Academic Profile
    \'last_education\',
    \'functional_position\',
    \'title_prefix\',
    \'title_suffix\',
    // SINTA Scores
    \'sinta_score_v2_overall\',
    \'sinta_score_v2_3yr\',
    \'sinta_score_v3_overall\',
    \'sinta_score_v3_3yr\',
    \'affil_score_v3_overall\',
    \'affil_score_v3_3yr\',
    // Scopus
    \'scopus_documents\',
    \'scopus_citations\',
    \'scopus_cited_documents\',
    \'scopus_h_index\',
    \'scopus_g_index\',
    \'scopus_i10_index\',
    // Google Scholar
    \'gs_documents\',
    \'gs_citations\',
    \'gs_cited_documents\',
    \'gs_h_index\',
    \'gs_g_index\',
    \'gs_i10_index\',
    // WoS
    \'wos_documents\',
    \'wos_citations\',
    \'wos_cited_documents\',
    \'wos_h_index\',
    \'wos_g_index\',
    \'wos_i10_index\',
    // Garuda
    \'garuda_documents\',
    \'garuda_citations\',
    \'garuda_cited_documents\',
    // Status
    \'is_active\',
    \'is_external\',
]',
          'attributes' => 
          array (
            'startLine' => 67,
            'endLine' => 123,
            'startTokenPos' => 45,
            'startFilePos' => 2352,
            'endTokenPos' => 205,
            'endFilePos' => 3743,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 67,
        'endLine' => 123,
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
        'startLine' => 130,
        'endLine' => 164,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Identity',
        'implementingClassName' => 'App\\Models\\Identity',
        'currentClassName' => 'App\\Models\\Identity',
        'aliasName' => NULL,
      ),
      'user' => 
      array (
        'name' => 'user',
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
 * Get the user that owns the identity.
 */',
        'startLine' => 169,
        'endLine' => 172,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Identity',
        'implementingClassName' => 'App\\Models\\Identity',
        'currentClassName' => 'App\\Models\\Identity',
        'aliasName' => NULL,
      ),
      'institution' => 
      array (
        'name' => 'institution',
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
 * Get the institution that the identity belongs to.
 */',
        'startLine' => 177,
        'endLine' => 180,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Identity',
        'implementingClassName' => 'App\\Models\\Identity',
        'currentClassName' => 'App\\Models\\Identity',
        'aliasName' => NULL,
      ),
      'studyProgram' => 
      array (
        'name' => 'studyProgram',
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
 * Get the study program that the identity belongs to.
 */',
        'startLine' => 185,
        'endLine' => 188,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Identity',
        'implementingClassName' => 'App\\Models\\Identity',
        'currentClassName' => 'App\\Models\\Identity',
        'aliasName' => NULL,
      ),
      'faculty' => 
      array (
        'name' => 'faculty',
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
 * Get the faculty that the identity belongs to.
 */',
        'startLine' => 193,
        'endLine' => 196,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Identity',
        'implementingClassName' => 'App\\Models\\Identity',
        'currentClassName' => 'App\\Models\\Identity',
        'aliasName' => NULL,
      ),
      'getSintaUrl' => 
      array (
        'name' => 'getSintaUrl',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
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
                  'name' => 'string',
                  'isIdentifier' => true,
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
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the official SINTA profile URL.
 */',
        'startLine' => 201,
        'endLine' => 208,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Identity',
        'implementingClassName' => 'App\\Models\\Identity',
        'currentClassName' => 'App\\Models\\Identity',
        'aliasName' => NULL,
      ),
      'getScopusUrl' => 
      array (
        'name' => 'getScopusUrl',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
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
                  'name' => 'string',
                  'isIdentifier' => true,
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
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the official Scopus profile URL.
 */',
        'startLine' => 213,
        'endLine' => 220,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Identity',
        'implementingClassName' => 'App\\Models\\Identity',
        'currentClassName' => 'App\\Models\\Identity',
        'aliasName' => NULL,
      ),
      'getGoogleScholarUrl' => 
      array (
        'name' => 'getGoogleScholarUrl',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
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
                  'name' => 'string',
                  'isIdentifier' => true,
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
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the official Google Scholar profile URL.
 */',
        'startLine' => 225,
        'endLine' => 232,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Identity',
        'implementingClassName' => 'App\\Models\\Identity',
        'currentClassName' => 'App\\Models\\Identity',
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