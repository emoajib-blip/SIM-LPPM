<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/CommunityService/Proposal/ReviewForm.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Livewire\CommunityService\Proposal\ReviewForm
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-2ed586bdb4ccf45dda4f190e2393d7f121d2fe0d962ea5ef4f1eb06f3d6ba404',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/CommunityService/Proposal/ReviewForm.php',
      ),
    ),
    'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
    'name' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
    'shortName' => 'ReviewForm',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 14,
    'endLine' => 64,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Livewire\\Component',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'App\\Livewire\\Concerns\\HasToast',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'review' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'name' => 'review',
        'modifiers' => 1,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Models\\ProposalReviewer',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 18,
        'endLine' => 18,
        'startColumn' => 5,
        'endColumn' => 36,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'comments' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'name' => 'comments',
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
            'startLine' => 21,
            'endLine' => 21,
            'startTokenPos' => 84,
            'startFilePos' => 496,
            'endTokenPos' => 84,
            'endFilePos' => 497,
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
                  'startLine' => 20,
                  'endLine' => 20,
                  'startTokenPos' => 72,
                  'startFilePos' => 439,
                  'endTokenPos' => 72,
                  'endFilePos' => 462,
                ),
              ),
            ),
          ),
        ),
        'startLine' => 20,
        'endLine' => 21,
        'startColumn' => 5,
        'endColumn' => 33,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'recommendation' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'name' => 'recommendation',
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
            'startTokenPos' => 102,
            'startFilePos' => 595,
            'endTokenPos' => 102,
            'endFilePos' => 596,
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
                'code' => '\'required|in:approved,rejected,revision\'',
                'attributes' => 
                array (
                  'startLine' => 23,
                  'endLine' => 23,
                  'startTokenPos' => 90,
                  'startFilePos' => 516,
                  'endTokenPos' => 90,
                  'endFilePos' => 555,
                ),
              ),
            ),
          ),
        ),
        'startLine' => 23,
        'endLine' => 24,
        'startColumn' => 5,
        'endColumn' => 39,
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
      'proposal' => 
      array (
        'name' => 'proposal',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
          0 => 
          array (
            'name' => 'Livewire\\Attributes\\Computed',
            'isRepeated' => false,
            'arguments' => 
            array (
            ),
          ),
        ),
        'docComment' => NULL,
        'startLine' => 26,
        'endLine' => 30,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'aliasName' => NULL,
      ),
      'submitReview' => 
      array (
        'name' => 'submitReview',
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
        'startLine' => 32,
        'endLine' => 57,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'aliasName' => NULL,
      ),
      'render' => 
      array (
        'name' => 'render',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'Illuminate\\View\\View',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 59,
        'endLine' => 63,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewForm',
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