<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/CommunityService/Proposal/ReviewerForm.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Livewire\CommunityService\Proposal\ReviewerForm
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-0b73e17e4c4d86b29f063bef9d8fcefece5aef69a30d0efd9da0703c33ff955f',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/CommunityService/Proposal/ReviewerForm.php',
      ),
    ),
    'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
    'name' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
    'shortName' => 'ReviewerForm',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property-read \\Illuminate\\Support\\Collection|\\App\\Models\\ReviewCriteria[] $activeCriterias
 * @property-read float $totalScore
 * @property-read \\App\\Models\\Proposal|null $proposal
 * @property-read \\App\\Models\\ProposalReviewer|null $myReview
 * @property-read \\Illuminate\\Support\\Collection|\\App\\Models\\ProposalReviewer[] $allReviews
 * @property-read bool $canReview
 * @property-read bool $needsAction
 * @property-read bool $hasReviewed
 * @property-read bool $needsReReview
 * @property-read bool $canEditReview
 * @property-read int $reviewRound
 * @property-read mixed $deadline
 * @property-read bool $isOverdue
 * @property-read int|null $daysRemaining
 * @property-read \\Illuminate\\Support\\Collection|\\App\\Models\\ReviewLog[] $previousRoundLogs
 * @property-read \\Illuminate\\Support\\Collection|\\App\\Models\\ReviewLog[] $allReviewLogs
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 35,
    'endLine' => 380,
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
      'proposalId' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'name' => 'proposalId',
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
            'startLine' => 39,
            'endLine' => 39,
            'startTokenPos' => 84,
            'startFilePos' => 1373,
            'endTokenPos' => 84,
            'endFilePos' => 1374,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 39,
        'endLine' => 39,
        'startColumn' => 5,
        'endColumn' => 35,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'showForm' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'name' => 'showForm',
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
            'startLine' => 41,
            'endLine' => 41,
            'startTokenPos' => 95,
            'startFilePos' => 1406,
            'endTokenPos' => 95,
            'endFilePos' => 1410,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 41,
        'endLine' => 41,
        'startColumn' => 5,
        'endColumn' => 34,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'reviewNotes' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'name' => 'reviewNotes',
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
            'startLine' => 43,
            'endLine' => 43,
            'startTokenPos' => 106,
            'startFilePos' => 1447,
            'endTokenPos' => 106,
            'endFilePos' => 1448,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 43,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 36,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'recommendation' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
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
            'startLine' => 45,
            'endLine' => 45,
            'startTokenPos' => 117,
            'startFilePos' => 1488,
            'endTokenPos' => 117,
            'endFilePos' => 1489,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 45,
        'endLine' => 45,
        'startColumn' => 5,
        'endColumn' => 39,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'scores' => 
      array (
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'name' => 'scores',
        'modifiers' => 1,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'array',
            'isIdentifier' => true,
          ),
        ),
        'default' => 
        array (
          'code' => '[]',
          'attributes' => 
          array (
            'startLine' => 47,
            'endLine' => 47,
            'startTokenPos' => 128,
            'startFilePos' => 1520,
            'endTokenPos' => 129,
            'endFilePos' => 1521,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 47,
        'endLine' => 47,
        'startColumn' => 5,
        'endColumn' => 30,
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
          'proposalId' => 
          array (
            'name' => 'proposalId',
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
            'startLine' => 49,
            'endLine' => 49,
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
        'startLine' => 49,
        'endLine' => 88,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'rules' => 
      array (
        'name' => 'rules',
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
        'startLine' => 90,
        'endLine' => 103,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'validationAttributes' => 
      array (
        'name' => 'validationAttributes',
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
        'startLine' => 105,
        'endLine' => 118,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'markReviewAsStarted' => 
      array (
        'name' => 'markReviewAsStarted',
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
 * Mark the review as started when reviewer first opens the form
 */',
        'startLine' => 123,
        'endLine' => 129,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'activeCriterias' => 
      array (
        'name' => 'activeCriterias',
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
        'startLine' => 131,
        'endLine' => 138,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'totalScore' => 
      array (
        'name' => 'totalScore',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'float',
            'isIdentifier' => true,
          ),
        ),
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
        'startLine' => 140,
        'endLine' => 152,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
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
        'startLine' => 154,
        'endLine' => 161,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'myReview' => 
      array (
        'name' => 'myReview',
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
        'startLine' => 163,
        'endLine' => 169,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'allReviews' => 
      array (
        'name' => 'allReviews',
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
        'startLine' => 171,
        'endLine' => 175,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'canReview' => 
      array (
        'name' => 'canReview',
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
        'startLine' => 177,
        'endLine' => 181,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'needsAction' => 
      array (
        'name' => 'needsAction',
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
        'startLine' => 183,
        'endLine' => 189,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'hasReviewed' => 
      array (
        'name' => 'hasReviewed',
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
        'startLine' => 191,
        'endLine' => 197,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'needsReReview' => 
      array (
        'name' => 'needsReReview',
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
        'startLine' => 199,
        'endLine' => 205,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'canEditReview' => 
      array (
        'name' => 'canEditReview',
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
        'startLine' => 207,
        'endLine' => 226,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'reviewRound' => 
      array (
        'name' => 'reviewRound',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'int',
            'isIdentifier' => true,
          ),
        ),
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
        'startLine' => 228,
        'endLine' => 235,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'deadline' => 
      array (
        'name' => 'deadline',
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
        'startLine' => 237,
        'endLine' => 241,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'isOverdue' => 
      array (
        'name' => 'isOverdue',
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
        'startLine' => 243,
        'endLine' => 247,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'daysRemaining' => 
      array (
        'name' => 'daysRemaining',
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
        'startLine' => 249,
        'endLine' => 253,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'previousRoundLogs' => 
      array (
        'name' => 'previousRoundLogs',
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
        'docComment' => '/**
 * Get previous round logs for the current reviewer (for showing history during re-review).
 */',
        'startLine' => 258,
        'endLine' => 269,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'getScoresForRound' => 
      array (
        'name' => 'getScoresForRound',
        'parameters' => 
        array (
          'round' => 
          array (
            'name' => 'round',
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
            'startLine' => 274,
            'endLine' => 274,
            'startColumn' => 39,
            'endColumn' => 48,
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
 * Get scores for history (by round)
 */',
        'startLine' => 274,
        'endLine' => 285,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'allReviewLogs' => 
      array (
        'name' => 'allReviewLogs',
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
        'docComment' => '/**
 * Get all review logs for this proposal (for showing complete history).
 */',
        'startLine' => 290,
        'endLine' => 299,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'toggleForm' => 
      array (
        'name' => 'toggleForm',
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
        'startLine' => 301,
        'endLine' => 309,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'aliasName' => NULL,
      ),
      'submitReview' => 
      array (
        'name' => 'submitReview',
        'parameters' => 
        array (
          'completeReviewAction' => 
          array (
            'name' => 'completeReviewAction',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Livewire\\Actions\\CompleteReviewAction',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 311,
            'endLine' => 311,
            'startColumn' => 34,
            'endColumn' => 97,
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
        'startLine' => 311,
        'endLine' => 374,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => true,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
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
        'startLine' => 376,
        'endLine' => 379,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\ReviewerForm',
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