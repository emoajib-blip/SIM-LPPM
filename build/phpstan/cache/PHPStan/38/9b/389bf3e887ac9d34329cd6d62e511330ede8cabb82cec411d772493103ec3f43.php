<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/Traits/ReportAccess.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Livewire\Traits\ReportAccess
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-d8fd3560f2ba5c78ce3eeaf8e49ee76d0621fafb8b8e6b4c083e85ab4d41d500',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Livewire\\Traits\\ReportAccess',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/Traits/ReportAccess.php',
      ),
    ),
    'namespace' => 'App\\Livewire\\Traits',
    'name' => 'App\\Livewire\\Traits\\ReportAccess',
    'shortName' => 'ReportAccess',
    'isInterface' => false,
    'isTrait' => true,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * Trait ReportAccess
 *
 * Handles report access control and loading logic
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 17,
    'endLine' => 99,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'proposal' => 
      array (
        'declaringClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'implementingClassName' => 'App\\Livewire\\Traits\\ReportAccess',
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
        'startLine' => 19,
        'endLine' => 19,
        'startColumn' => 5,
        'endColumn' => 30,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'progressReport' => 
      array (
        'declaringClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'implementingClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'name' => 'progressReport',
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
                  'name' => 'App\\Models\\ProgressReport',
                  'isIdentifier' => false,
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
            'startLine' => 21,
            'endLine' => 21,
            'startTokenPos' => 59,
            'startFilePos' => 369,
            'endTokenPos' => 59,
            'endFilePos' => 372,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 21,
        'endLine' => 21,
        'startColumn' => 5,
        'endColumn' => 50,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'canEdit' => 
      array (
        'declaringClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'implementingClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'name' => 'canEdit',
        'modifiers' => 1,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'default' => 
        array (
          'code' => 'false',
          'attributes' => 
          array (
            'startLine' => 23,
            'endLine' => 23,
            'startTokenPos' => 70,
            'startFilePos' => 403,
            'endTokenPos' => 70,
            'endFilePos' => 407,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 23,
        'endLine' => 23,
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
      'onReportSaved' => 
      array (
        'name' => 'onReportSaved',
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
                'code' => '\'report-saved\'',
                'attributes' => 
                array (
                  'startLine' => 25,
                  'endLine' => 25,
                  'startTokenPos' => 76,
                  'startFilePos' => 420,
                  'endTokenPos' => 76,
                  'endFilePos' => 433,
                ),
              ),
            ),
          ),
        ),
        'docComment' => NULL,
        'startLine' => 25,
        'endLine' => 29,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\Traits',
        'declaringClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'implementingClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'currentClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'aliasName' => NULL,
      ),
      'checkAccess' => 
      array (
        'name' => 'checkAccess',
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
 * Check if current user has access to view and edit the report
 */',
        'startLine' => 34,
        'endLine' => 52,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Livewire\\Traits',
        'declaringClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'implementingClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'currentClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'aliasName' => NULL,
      ),
      'canView' => 
      array (
        'name' => 'canView',
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
 * Check if current user can view the report
 * User can view if they are submitter or accepted team member
 */',
        'startLine' => 58,
        'endLine' => 79,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Livewire\\Traits',
        'declaringClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'implementingClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'currentClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'aliasName' => NULL,
      ),
      'loadReport' => 
      array (
        'name' => 'loadReport',
        'parameters' => 
        array (
          'type' => 
          array (
            'name' => 'type',
            'default' => 
            array (
              'code' => '\'progress\'',
              'attributes' => 
              array (
                'startLine' => 84,
                'endLine' => 84,
                'startTokenPos' => 404,
                'startFilePos' => 2304,
                'endTokenPos' => 404,
                'endFilePos' => 2313,
              ),
            ),
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
            'startLine' => 84,
            'endLine' => 84,
            'startColumn' => 35,
            'endColumn' => 59,
            'parameterIndex' => 0,
            'isOptional' => true,
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
        'docComment' => '/**
 * Load latest progress report for the proposal, filtered by type
 */',
        'startLine' => 84,
        'endLine' => 98,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Livewire\\Traits',
        'declaringClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'implementingClassName' => 'App\\Livewire\\Traits\\ReportAccess',
        'currentClassName' => 'App\\Livewire\\Traits\\ReportAccess',
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