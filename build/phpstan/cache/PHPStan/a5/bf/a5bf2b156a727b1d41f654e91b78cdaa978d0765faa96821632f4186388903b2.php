<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/Proposal.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Models\Proposal
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-f50a56bbe3bce1e83a2c89bafbb02fde26f7ce0e46e935298692070aaedfc048',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Models\\Proposal',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Models/Proposal.php',
      ),
    ),
    'namespace' => 'App\\Models',
    'name' => 'App\\Models\\Proposal',
    'shortName' => 'Proposal',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property string $id
 * @property string $title
 * @property string $submitter_id
 * @property string|null $detailable_id
 * @property string|null $detailable_type
 * @property string|null $research_scheme_id
 * @property string|null $community_service_scheme_id
 * @property string|null $focus_area_id
 * @property string|null $theme_id
 * @property string|null $topic_id
 * @property string|null $national_priority_id
 * @property string|null $cluster_level1_id
 * @property string|null $cluster_level2_id
 * @property string|null $cluster_level3_id
 * @property float|null $sbk_value
 * @property int|null $duration_in_years
 * @property int|null $start_year
 * @property string|null $summary
 * @property string|null $asta_cita
 * @property \\App\\Enums\\ProposalStatus $status
 * @property array|null $student_members
 * @property-read \\App\\Models\\User $submitter
 * @property-read \\Illuminate\\Database\\Eloquent\\Model|\\App\\Models\\Research|\\App\\Models\\CommunityService $detailable
 * @property-read \\App\\Models\\ResearchScheme|null $researchScheme
 * @property-read \\App\\Models\\CommunityServiceScheme|null $communityServiceScheme
 * @property-read \\App\\Models\\FocusArea|null $focusArea
 * @property-read \\App\\Models\\Theme|null $theme
 * @property-read \\App\\Models\\Topic|null $topic
 * @property-read \\App\\Models\\NationalPriority|null $nationalPriority
 * @property-read \\App\\Models\\ScienceCluster|null $clusterLevel1
 * @property-read \\App\\Models\\ScienceCluster|null $clusterLevel2
 * @property-read \\App\\Models\\ScienceCluster|null $clusterLevel3
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\Sdg[] $sdgs
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\MasterIku[] $targetedIkus
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\ProposalMonev[] $monevs
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\User[] $teamMembers
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\Keyword[] $keywords
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\ProposalOutput[] $outputs
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\BudgetItem[] $budgetItems
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\Partner[] $partners
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\ActivitySchedule[] $activitySchedules
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\ResearchStage[] $researchStages
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\ProposalReviewer[] $reviewers
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\ProgressReport[] $progressReports
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\DailyNote[] $dailyNotes
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\ProposalStatusLog[] $statusLogs
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\ReviewLog[] $reviewLogs
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\ProposalActivity[] $activities
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection|\\App\\Models\\DocumentSignature[] $signatures
 * @property-read \\App\\Models\\User $user
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 68,
    'endLine' => 471,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Illuminate\\Database\\Eloquent\\Model',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      1 => 'Illuminate\\Database\\Eloquent\\Concerns\\HasUuids',
      2 => 'Illuminate\\Database\\Eloquent\\SoftDeletes',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'notes' => 
      array (
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'name' => 'notes',
        'modifiers' => 1,
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
        'default' => 
        array (
          'code' => 'null',
          'attributes' => 
          array (
            'startLine' => 73,
            'endLine' => 73,
            'startTokenPos' => 91,
            'startFilePos' => 3948,
            'endTokenPos' => 91,
            'endFilePos' => 3951,
          ),
        ),
        'docComment' => NULL,
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
      'keyType' => 
      array (
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'name' => 'keyType',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '\'string\'',
          'attributes' => 
          array (
            'startLine' => 78,
            'endLine' => 78,
            'startTokenPos' => 102,
            'startFilePos' => 4055,
            'endTokenPos' => 102,
            'endFilePos' => 4062,
          ),
        ),
        'docComment' => '/**
 * The type of the auto-incrementing ID\'s primary key.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 78,
        'endLine' => 78,
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
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'name' => 'incrementing',
        'modifiers' => 1,
        'type' => NULL,
        'default' => 
        array (
          'code' => 'false',
          'attributes' => 
          array (
            'startLine' => 83,
            'endLine' => 83,
            'startTokenPos' => 113,
            'startFilePos' => 4158,
            'endTokenPos' => 113,
            'endFilePos' => 4162,
          ),
        ),
        'docComment' => '/**
 * Indicates if the ID is auto-incrementing.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 83,
        'endLine' => 83,
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
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'name' => 'fillable',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[\'title\', \'submitter_id\', \'detailable_id\', \'detailable_type\', \'research_scheme_id\', \'community_service_scheme_id\', \'focus_area_id\', \'theme_id\', \'topic_id\', \'national_priority_id\', \'cluster_level1_id\', \'cluster_level2_id\', \'cluster_level3_id\', \'sbk_value\', \'duration_in_years\', \'start_year\', \'semester\', \'summary\', \'asta_cita\', \'status\', \'logbook_signed_at\', \'logbook_approved_at\', \'student_members\']',
          'attributes' => 
          array (
            'startLine' => 85,
            'endLine' => 109,
            'startTokenPos' => 122,
            'startFilePos' => 4192,
            'endTokenPos' => 193,
            'endFilePos' => 4781,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 85,
        'endLine' => 109,
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
        'startLine' => 116,
        'endLine' => 126,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'sdgs' => 
      array (
        'name' => 'sdgs',
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
 * Get the SDGs for the proposal.
 */',
        'startLine' => 131,
        'endLine' => 134,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'targetedIkus' => 
      array (
        'name' => 'targetedIkus',
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
 * Get the targeted IKUs for the proposal.
 */',
        'startLine' => 139,
        'endLine' => 142,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'monevs' => 
      array (
        'name' => 'monevs',
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
 * Get all monev sessions for the proposal.
 */',
        'startLine' => 147,
        'endLine' => 150,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
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
 * Get the user who submitted the proposal.
 */',
        'startLine' => 155,
        'endLine' => 158,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
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
 * Alias for submitter relationship.
 */',
        'startLine' => 163,
        'endLine' => 166,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'detailable' => 
      array (
        'name' => 'detailable',
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
        'docComment' => '/**
 * Get the detailable model (Research or CommunityService).
 */',
        'startLine' => 171,
        'endLine' => 174,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'researchScheme' => 
      array (
        'name' => 'researchScheme',
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
 * Get the research scheme for the proposal.
 */',
        'startLine' => 179,
        'endLine' => 182,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'communityServiceScheme' => 
      array (
        'name' => 'communityServiceScheme',
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
 * Get the community service scheme for the proposal.
 */',
        'startLine' => 187,
        'endLine' => 190,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'focusArea' => 
      array (
        'name' => 'focusArea',
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
 * Get the focus area for the proposal.
 */',
        'startLine' => 195,
        'endLine' => 198,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'theme' => 
      array (
        'name' => 'theme',
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
 * Get the theme for the proposal.
 */',
        'startLine' => 203,
        'endLine' => 206,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'topic' => 
      array (
        'name' => 'topic',
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
 * Get the topic for the proposal.
 */',
        'startLine' => 211,
        'endLine' => 214,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'nationalPriority' => 
      array (
        'name' => 'nationalPriority',
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
 * Get the national priority for the proposal.
 */',
        'startLine' => 219,
        'endLine' => 222,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'clusterLevel1' => 
      array (
        'name' => 'clusterLevel1',
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
 * Get the level 1 science cluster for the proposal.
 */',
        'startLine' => 227,
        'endLine' => 230,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'clusterLevel2' => 
      array (
        'name' => 'clusterLevel2',
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
 * Get the level 2 science cluster for the proposal.
 */',
        'startLine' => 235,
        'endLine' => 238,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'clusterLevel3' => 
      array (
        'name' => 'clusterLevel3',
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
 * Get the level 3 science cluster for the proposal.
 */',
        'startLine' => 243,
        'endLine' => 246,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'teamMembers' => 
      array (
        'name' => 'teamMembers',
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
        'docComment' => NULL,
        'startLine' => 248,
        'endLine' => 254,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
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
 * Get all keywords for the proposal.
 */',
        'startLine' => 259,
        'endLine' => 263,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'outputs' => 
      array (
        'name' => 'outputs',
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
 * Get all outputs for the proposal.
 */',
        'startLine' => 268,
        'endLine' => 271,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'budgetItems' => 
      array (
        'name' => 'budgetItems',
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
 * Get all budget items for the proposal.
 */',
        'startLine' => 276,
        'endLine' => 279,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'partners' => 
      array (
        'name' => 'partners',
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
 * Get all partners for the proposal.
 */',
        'startLine' => 284,
        'endLine' => 288,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'activitySchedules' => 
      array (
        'name' => 'activitySchedules',
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
 * Get all activity schedules for the proposal.
 */',
        'startLine' => 293,
        'endLine' => 296,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'researchStages' => 
      array (
        'name' => 'researchStages',
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
 * Get all research stages for the proposal.
 */',
        'startLine' => 301,
        'endLine' => 304,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'reviewers' => 
      array (
        'name' => 'reviewers',
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
 * Get all reviewers for the proposal.
 */',
        'startLine' => 309,
        'endLine' => 312,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'progressReports' => 
      array (
        'name' => 'progressReports',
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
 * Get all progress reports for the proposal.
 */',
        'startLine' => 317,
        'endLine' => 320,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'dailyNotes' => 
      array (
        'name' => 'dailyNotes',
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
 * Get all daily notes for the proposal.
 */',
        'startLine' => 325,
        'endLine' => 328,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'statusLogs' => 
      array (
        'name' => 'statusLogs',
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
 * Get all status change logs for the proposal.
 */',
        'startLine' => 333,
        'endLine' => 336,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'reviewLogs' => 
      array (
        'name' => 'reviewLogs',
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
 * Get all review logs for the proposal.
 */',
        'startLine' => 341,
        'endLine' => 344,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'activities' => 
      array (
        'name' => 'activities',
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
 * Get all activities for the proposal.
 */',
        'startLine' => 349,
        'endLine' => 352,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
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
 * Get all digital signatures for the proposal.
 */',
        'startLine' => 357,
        'endLine' => 360,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'allTeamMembersAccepted' => 
      array (
        'name' => 'allTeamMembersAccepted',
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
 * Check if all team members have accepted the invitation.
 */',
        'startLine' => 365,
        'endLine' => 377,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'allReviewsCompleted' => 
      array (
        'name' => 'allReviewsCompleted',
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
 * Check if all reviewers have completed their reviews.
 */',
        'startLine' => 382,
        'endLine' => 397,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'pendingTeamMembers' => 
      array (
        'name' => 'pendingTeamMembers',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get pending team member invitations.
 */',
        'startLine' => 402,
        'endLine' => 406,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'pendingReviewers' => 
      array (
        'name' => 'pendingReviewers',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get pending reviewer assignments.
 */',
        'startLine' => 411,
        'endLine' => 418,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'getPendingTeamMembers' => 
      array (
        'name' => 'getPendingTeamMembers',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get all pending team members (anggota who haven\'t accepted).
 */',
        'startLine' => 423,
        'endLine' => 428,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'getPendingReviewers' => 
      array (
        'name' => 'getPendingReviewers',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get all pending reviewers (who haven\'t completed their review).
 */',
        'startLine' => 433,
        'endLine' => 438,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'canBeApproved' => 
      array (
        'name' => 'canBeApproved',
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
 * Check if proposal can be approved (all reviewers completed).
 */',
        'startLine' => 443,
        'endLine' => 446,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'monevReviews' => 
      array (
        'name' => 'monevReviews',
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
 * Get all monev reviews (post-completion audits) for the proposal.
 */',
        'startLine' => 451,
        'endLine' => 454,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'scopeForAcademicYear' => 
      array (
        'name' => 'scopeForAcademicYear',
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
            'startLine' => 459,
            'endLine' => 459,
            'startColumn' => 42,
            'endColumn' => 47,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'year' => 
          array (
            'name' => 'year',
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
            'startLine' => 459,
            'endLine' => 459,
            'startColumn' => 50,
            'endColumn' => 61,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Scope for academic year.
 */',
        'startLine' => 459,
        'endLine' => 462,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
        'aliasName' => NULL,
      ),
      'scopeForSemester' => 
      array (
        'name' => 'scopeForSemester',
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
            'startLine' => 467,
            'endLine' => 467,
            'startColumn' => 38,
            'endColumn' => 43,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'semester' => 
          array (
            'name' => 'semester',
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
            'startLine' => 467,
            'endLine' => 467,
            'startColumn' => 46,
            'endColumn' => 61,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Scope for semester.
 */',
        'startLine' => 467,
        'endLine' => 470,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Models',
        'declaringClassName' => 'App\\Models\\Proposal',
        'implementingClassName' => 'App\\Models\\Proposal',
        'currentClassName' => 'App\\Models\\Proposal',
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