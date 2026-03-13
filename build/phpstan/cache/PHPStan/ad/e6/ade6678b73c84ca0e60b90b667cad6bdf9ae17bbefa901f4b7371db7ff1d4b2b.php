<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/Research/Proposal/ReviewForm.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Livewire\Research\Proposal\ReviewForm
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-f5ceb97326170ea78916e5fa6b517a29b1be3f3cbc29ccea41db76bb6fdb8a3d',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/Research/Proposal/ReviewForm.php',
      ),
    ),
    'namespace' => 'App\\Livewire\\Research\\Proposal',
    'name' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
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
        'declaringClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
        'implementingClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
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
        'declaringClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
        'implementingClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
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
            'startFilePos' => 488,
            'endTokenPos' => 84,
            'endFilePos' => 489,
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
                  'startFilePos' => 431,
                  'endTokenPos' => 72,
                  'endFilePos' => 454,
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
        'declaringClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
        'implementingClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
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
            'startFilePos' => 587,
            'endTokenPos' => 102,
            'endFilePos' => 588,
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
                  'startFilePos' => 508,
                  'endTokenPos' => 90,
                  'endFilePos' => 547,
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
        'namespace' => 'App\\Livewire\\Research\\Proposal',
        'declaringClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
        'implementingClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
        'currentClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
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
        'namespace' => 'App\\Livewire\\Research\\Proposal',
        'declaringClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
        'implementingClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
        'currentClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
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
        'namespace' => 'App\\Livewire\\Research\\Proposal',
        'declaringClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
        'implementingClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
        'currentClassName' => 'App\\Livewire\\Research\\Proposal\\ReviewForm',
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