<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/Abstracts/ProposalShow.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Livewire\Abstracts\ProposalShow
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-804fbbb77f20692e163a721a6eadb0405d86d2beec78adffa87394dfbdedfd7d',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/Abstracts/ProposalShow.php',
      ),
    ),
    'namespace' => 'App\\Livewire\\Abstracts',
    'name' => 'App\\Livewire\\Abstracts\\ProposalShow',
    'shortName' => 'ProposalShow',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 64,
    'docComment' => '/**
 * @property-read bool $canEdit
 * @property-read bool $canDelete
 * @property-read string $statusLabel
 * @property-read string $statusColor
 *
 * "Efficiency is the goal, but Integrity is the foundation."
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 22,
    'endLine' => 125,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Livewire\\Component',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'App\\Livewire\\Traits\\WithApproval',
      1 => 'App\\Livewire\\Traits\\WithTeamManagement',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'form' => 
      array (
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'name' => 'form',
        'modifiers' => 1,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Livewire\\Forms\\ProposalForm',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 33,
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
      'proposal' => 
      array (
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
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
        'startLine' => 35,
        'endLine' => 35,
        'startColumn' => 5,
        'endColumn' => 30,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'proposalService' => 
      array (
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'name' => 'proposalService',
        'modifiers' => 2,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Services\\ProposalService',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 37,
        'endLine' => 37,
        'startColumn' => 5,
        'endColumn' => 47,
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
      'boot' => 
      array (
        'name' => 'boot',
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
        'startLine' => 39,
        'endLine' => 42,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
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
            'startLine' => 44,
            'endLine' => 44,
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
        'startLine' => 44,
        'endLine' => 49,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
      'getProposalType' => 
      array (
        'name' => 'getProposalType',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 51,
        'endLine' => 51,
        'startColumn' => 5,
        'endColumn' => 58,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 66,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
      'getIndexRoute' => 
      array (
        'name' => 'getIndexRoute',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 53,
        'endLine' => 53,
        'startColumn' => 5,
        'endColumn' => 56,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 66,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
      'getEditRoute' => 
      array (
        'name' => 'getEditRoute',
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
            'startLine' => 55,
            'endLine' => 55,
            'startColumn' => 46,
            'endColumn' => 63,
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
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 55,
        'endLine' => 55,
        'startColumn' => 5,
        'endColumn' => 73,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 66,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
      'getReviewRoute' => 
      array (
        'name' => 'getReviewRoute',
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
            'startLine' => 57,
            'endLine' => 57,
            'startColumn' => 48,
            'endColumn' => 65,
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
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 57,
        'endLine' => 57,
        'startColumn' => 5,
        'endColumn' => 75,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 66,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
      'getProposal' => 
      array (
        'name' => 'getProposal',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Models\\Proposal',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 59,
        'endLine' => 62,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
      'delete' => 
      array (
        'name' => 'delete',
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
        'startLine' => 64,
        'endLine' => 73,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
      'edit' => 
      array (
        'name' => 'edit',
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
        'startLine' => 75,
        'endLine' => 82,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
      'review' => 
      array (
        'name' => 'review',
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
        'startLine' => 84,
        'endLine' => 87,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
      'statusLabel' => 
      array (
        'name' => 'statusLabel',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
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
        'startLine' => 89,
        'endLine' => 93,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
      'statusColor' => 
      array (
        'name' => 'statusColor',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
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
        'startLine' => 95,
        'endLine' => 99,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
      'canEdit' => 
      array (
        'name' => 'canEdit',
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
        'startLine' => 101,
        'endLine' => 108,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
      'canDelete' => 
      array (
        'name' => 'canDelete',
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
        'startLine' => 110,
        'endLine' => 117,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
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
        'startLine' => 119,
        'endLine' => 122,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'aliasName' => NULL,
      ),
      'getViewName' => 
      array (
        'name' => 'getViewName',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'string',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 124,
        'endLine' => 124,
        'startColumn' => 5,
        'endColumn' => 54,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 66,
        'namespace' => 'App\\Livewire\\Abstracts',
        'declaringClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'implementingClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
        'currentClassName' => 'App\\Livewire\\Abstracts\\ProposalShow',
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
        'app\\livewire\\traits\\withteammanagement::toast' => 'app\\livewire\\traits\\withapproval::toast',
        'app\\livewire\\traits\\withteammanagement::toastsuccess' => 'app\\livewire\\traits\\withapproval::toastsuccess',
        'app\\livewire\\traits\\withteammanagement::toasterror' => 'app\\livewire\\traits\\withapproval::toasterror',
        'app\\livewire\\traits\\withteammanagement::toastwarning' => 'app\\livewire\\traits\\withapproval::toastwarning',
        'app\\livewire\\traits\\withteammanagement::toastinfo' => 'app\\livewire\\traits\\withapproval::toastinfo',
        'app\\livewire\\traits\\withteammanagement::getdefaulttoasttitle' => 'app\\livewire\\traits\\withapproval::getdefaulttoasttitle',
      ),
      'hashes' => 
      array (
        'app\\livewire\\traits\\withapproval::toast' => 'App\\Livewire\\Traits\\WithApproval::toast',
        'app\\livewire\\traits\\withapproval::toastsuccess' => 'App\\Livewire\\Traits\\WithApproval::toastSuccess',
        'app\\livewire\\traits\\withapproval::toasterror' => 'App\\Livewire\\Traits\\WithApproval::toastError',
        'app\\livewire\\traits\\withapproval::toastwarning' => 'App\\Livewire\\Traits\\WithApproval::toastWarning',
        'app\\livewire\\traits\\withapproval::toastinfo' => 'App\\Livewire\\Traits\\WithApproval::toastInfo',
        'app\\livewire\\traits\\withapproval::getdefaulttoasttitle' => 'App\\Livewire\\Traits\\WithApproval::getDefaultToastTitle',
      ),
    ),
  ),
));