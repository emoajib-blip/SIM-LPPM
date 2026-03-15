<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/CommunityService/DailyNote/Show.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Livewire\CommunityService\DailyNote\Show
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-1239e86e53502478bf1f0770ac36e28e4ed564615dc3d34e58c85d5294a3c742',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/CommunityService/DailyNote/Show.php',
      ),
    ),
    'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
    'name' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
    'shortName' => 'Show',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 15,
    'endLine' => 291,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Livewire\\Component',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'App\\Livewire\\Traits\\HasReportTemplates',
      1 => 'App\\Livewire\\Concerns\\HasToast',
      2 => 'Livewire\\WithFileUploads',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'proposal' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'name' => 'proposal',
        'modifiers' => 1,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Models\\Proposal',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 21,
        'endLine' => 21,
        'startColumn' => 5,
        'endColumn' => 30,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'activity_date' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'name' => 'activity_date',
        'modifiers' => 1,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'default' => 
        array (
          'code' => '\'\'',
          'attributes' => 
          array (
            'startLine' => 24,
            'endLine' => 24,
            'startTokenPos' => 99,
            'startFilePos' => 601,
            'endTokenPos' => 99,
            'endFilePos' => 602,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
          0 => 
          array (
            'name' => 'Livewire\\Attributes\\Validate',
            'isRepeated' => false,
            'arguments' => 
            array (
              0 => 
              array (
                'code' => '\'required|date|before_or_equal:today\'',
                'attributes' => 
                array (
                  'startLine' => 23,
                  'endLine' => 23,
                  'startTokenPos' => 87,
                  'startFilePos' => 526,
                  'endTokenPos' => 87,
                  'endFilePos' => 562,
                ),
              ),
            ),
          ),
        ),
        'startLine' => 23,
        'endLine' => 24,
        'startColumn' => 5,
        'endColumn' => 38,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'activity_description' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'name' => 'activity_description',
        'modifiers' => 1,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'default' => 
        array (
          'code' => '\'\'',
          'attributes' => 
          array (
            'startLine' => 27,
            'endLine' => 27,
            'startTokenPos' => 117,
            'startFilePos' => 690,
            'endTokenPos' => 117,
            'endFilePos' => 691,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
          0 => 
          array (
            'name' => 'Livewire\\Attributes\\Validate',
            'isRepeated' => false,
            'arguments' => 
            array (
              0 => 
              array (
                'code' => '\'required|string|min:10\'',
                'attributes' => 
                array (
                  'startLine' => 26,
                  'endLine' => 26,
                  'startTokenPos' => 105,
                  'startFilePos' => 621,
                  'endTokenPos' => 105,
                  'endFilePos' => 644,
                ),
              ),
            ),
          ),
        ),
        'startLine' => 26,
        'endLine' => 27,
        'startColumn' => 5,
        'endColumn' => 45,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'progress_percentage' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'name' => 'progress_percentage',
        'modifiers' => 1,
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
          'code' => '0',
          'attributes' => 
          array (
            'startLine' => 30,
            'endLine' => 30,
            'startTokenPos' => 135,
            'startFilePos' => 783,
            'endTokenPos' => 135,
            'endFilePos' => 783,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
          0 => 
          array (
            'name' => 'Livewire\\Attributes\\Validate',
            'isRepeated' => false,
            'arguments' => 
            array (
              0 => 
              array (
                'code' => '\'required|integer|min:0|max:100\'',
                'attributes' => 
                array (
                  'startLine' => 29,
                  'endLine' => 29,
                  'startTokenPos' => 123,
                  'startFilePos' => 710,
                  'endTokenPos' => 123,
                  'endFilePos' => 741,
                ),
              ),
            ),
          ),
        ),
        'startLine' => 29,
        'endLine' => 30,
        'startColumn' => 5,
        'endColumn' => 40,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'notes' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'name' => 'notes',
        'modifiers' => 1,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'default' => 
        array (
          'code' => '\'\'',
          'attributes' => 
          array (
            'startLine' => 33,
            'endLine' => 33,
            'startTokenPos' => 153,
            'startFilePos' => 849,
            'endTokenPos' => 153,
            'endFilePos' => 850,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
          0 => 
          array (
            'name' => 'Livewire\\Attributes\\Validate',
            'isRepeated' => false,
            'arguments' => 
            array (
              0 => 
              array (
                'code' => '\'nullable|string\'',
                'attributes' => 
                array (
                  'startLine' => 32,
                  'endLine' => 32,
                  'startTokenPos' => 141,
                  'startFilePos' => 802,
                  'endTokenPos' => 141,
                  'endFilePos' => 818,
                ),
              ),
            ),
          ),
        ),
        'startLine' => 32,
        'endLine' => 33,
        'startColumn' => 5,
        'endColumn' => 30,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'budget_group_id' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'name' => 'budget_group_id',
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
                  'name' => 'int',
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
            'startLine' => 36,
            'endLine' => 36,
            'startTokenPos' => 172,
            'startFilePos' => 941,
            'endTokenPos' => 172,
            'endFilePos' => 944,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
          0 => 
          array (
            'name' => 'Livewire\\Attributes\\Validate',
            'isRepeated' => false,
            'arguments' => 
            array (
              0 => 
              array (
                'code' => '\'nullable|exists:budget_groups,id\'',
                'attributes' => 
                array (
                  'startLine' => 35,
                  'endLine' => 35,
                  'startTokenPos' => 159,
                  'startFilePos' => 869,
                  'endTokenPos' => 159,
                  'endFilePos' => 902,
                ),
              ),
            ),
          ),
        ),
        'startLine' => 35,
        'endLine' => 36,
        'startColumn' => 5,
        'endColumn' => 40,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'amount' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'name' => 'amount',
        'modifiers' => 1,
        'type' => NULL,
        'default' => 
        array (
          'code' => '0',
          'attributes' => 
          array (
            'startLine' => 39,
            'endLine' => 39,
            'startTokenPos' => 188,
            'startFilePos' => 1011,
            'endTokenPos' => 188,
            'endFilePos' => 1011,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
          0 => 
          array (
            'name' => 'Livewire\\Attributes\\Validate',
            'isRepeated' => false,
            'arguments' => 
            array (
              0 => 
              array (
                'code' => '\'nullable|numeric|min:0\'',
                'attributes' => 
                array (
                  'startLine' => 38,
                  'endLine' => 38,
                  'startTokenPos' => 178,
                  'startFilePos' => 963,
                  'endTokenPos' => 178,
                  'endFilePos' => 986,
                ),
              ),
            ),
          ),
        ),
        'startLine' => 38,
        'endLine' => 39,
        'startColumn' => 5,
        'endColumn' => 23,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'evidence' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'name' => 'evidence',
        'modifiers' => 1,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[]',
          'attributes' => 
          array (
            'startLine' => 42,
            'endLine' => 42,
            'startTokenPos' => 212,
            'startFilePos' => 1141,
            'endTokenPos' => 213,
            'endFilePos' => 1142,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
          0 => 
          array (
            'name' => 'Livewire\\Attributes\\Validate',
            'isRepeated' => false,
            'arguments' => 
            array (
              0 => 
              array (
                'code' => '[\'evidence.*\' => \'file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120\']',
                'attributes' => 
                array (
                  'startLine' => 41,
                  'endLine' => 41,
                  'startTokenPos' => 194,
                  'startFilePos' => 1030,
                  'endTokenPos' => 200,
                  'endFilePos' => 1094,
                ),
              ),
            ),
          ),
        ),
        'startLine' => 41,
        'endLine' => 42,
        'startColumn' => 5,
        'endColumn' => 26,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'editingId' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'name' => 'editingId',
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
            'startLine' => 44,
            'endLine' => 44,
            'startTokenPos' => 225,
            'startFilePos' => 1178,
            'endTokenPos' => 225,
            'endFilePos' => 1181,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 44,
        'endLine' => 44,
        'startColumn' => 5,
        'endColumn' => 37,
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
      'mount' => 
      array (
        'name' => 'mount',
        'parameters' => 
        array (
          'proposal' => 
          array (
            'name' => 'proposal',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Models\\Proposal',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 46,
            'endLine' => 46,
            'startColumn' => 27,
            'endColumn' => 44,
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
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 46,
        'endLine' => 54,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'aliasName' => NULL,
      ),
      'canAccess' => 
      array (
        'name' => 'canAccess',
        'parameters' => 
        array (
          'proposal' => 
          array (
            'name' => 'proposal',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Models\\Proposal',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 56,
            'endLine' => 56,
            'startColumn' => 34,
            'endColumn' => 51,
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
        'startLine' => 56,
        'endLine' => 66,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'aliasName' => NULL,
      ),
      'canManage' => 
      array (
        'name' => 'canManage',
        'parameters' => 
        array (
          'proposal' => 
          array (
            'name' => 'proposal',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Models\\Proposal',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 68,
            'endLine' => 68,
            'startColumn' => 31,
            'endColumn' => 48,
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
        'startLine' => 68,
        'endLine' => 74,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'aliasName' => NULL,
      ),
      'create' => 
      array (
        'name' => 'create',
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
        'startLine' => 76,
        'endLine' => 85,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'aliasName' => NULL,
      ),
      'save' => 
      array (
        'name' => 'save',
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
        'startLine' => 87,
        'endLine' => 153,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'aliasName' => NULL,
      ),
      'edit' => 
      array (
        'name' => 'edit',
        'parameters' => 
        array (
          'id' => 
          array (
            'name' => 'id',
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
            'startLine' => 155,
            'endLine' => 155,
            'startColumn' => 26,
            'endColumn' => 35,
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
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 155,
        'endLine' => 177,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'aliasName' => NULL,
      ),
      'delete' => 
      array (
        'name' => 'delete',
        'parameters' => 
        array (
          'id' => 
          array (
            'name' => 'id',
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
            'startLine' => 179,
            'endLine' => 179,
            'startColumn' => 28,
            'endColumn' => 37,
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
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 179,
        'endLine' => 193,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'aliasName' => NULL,
      ),
      'deleteEvidence' => 
      array (
        'name' => 'deleteEvidence',
        'parameters' => 
        array (
          'mediaId' => 
          array (
            'name' => 'mediaId',
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
            'startLine' => 195,
            'endLine' => 195,
            'startColumn' => 36,
            'endColumn' => 50,
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
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 195,
        'endLine' => 214,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'aliasName' => NULL,
      ),
      'removeEvidence' => 
      array (
        'name' => 'removeEvidence',
        'parameters' => 
        array (
          'index' => 
          array (
            'name' => 'index',
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
            'startLine' => 216,
            'endLine' => 216,
            'startColumn' => 36,
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
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 216,
        'endLine' => 222,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'aliasName' => NULL,
      ),
      'cancelEdit' => 
      array (
        'name' => 'cancelEdit',
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
        'startLine' => 224,
        'endLine' => 229,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'aliasName' => NULL,
      ),
      'render' => 
      array (
        'name' => 'render',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 231,
        'endLine' => 243,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'aliasName' => NULL,
      ),
      'signLogbook' => 
      array (
        'name' => 'signLogbook',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
          0 => 
          array (
            'name' => 'Livewire\\Attributes\\On',
            'isRepeated' => false,
            'arguments' => 
            array (
              0 => 
              array (
                'code' => '\'sign-logbook\'',
                'attributes' => 
                array (
                  'startLine' => 245,
                  'endLine' => 245,
                  'startTokenPos' => 1802,
                  'startFilePos' => 8186,
                  'endTokenPos' => 1802,
                  'endFilePos' => 8199,
                ),
              ),
            ),
          ),
        ),
        'docComment' => NULL,
        'startLine' => 245,
        'endLine' => 271,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'aliasName' => NULL,
      ),
      'canApprove' => 
      array (
        'name' => 'canApprove',
        'parameters' => 
        array (
          'proposal' => 
          array (
            'name' => 'proposal',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Models\\Proposal',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 273,
            'endLine' => 273,
            'startColumn' => 32,
            'endColumn' => 49,
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
        'startLine' => 273,
        'endLine' => 276,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'aliasName' => NULL,
      ),
      'approveLogbook' => 
      array (
        'name' => 'approveLogbook',
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
          0 => 
          array (
            'name' => 'Livewire\\Attributes\\On',
            'isRepeated' => false,
            'arguments' => 
            array (
              0 => 
              array (
                'code' => '\'approve-logbook\'',
                'attributes' => 
                array (
                  'startLine' => 278,
                  'endLine' => 278,
                  'startTokenPos' => 2042,
                  'startFilePos' => 9310,
                  'endTokenPos' => 2042,
                  'endFilePos' => 9326,
                ),
              ),
            ),
          ),
        ),
        'docComment' => NULL,
        'startLine' => 278,
        'endLine' => 290,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\DailyNote',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
        'currentClassName' => 'App\\Livewire\\CommunityService\\DailyNote\\Show',
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