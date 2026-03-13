<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/CommunityService/Proposal/TeamMemberInvitations.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Livewire\CommunityService\Proposal\TeamMemberInvitations
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-b54fc8fe80abe731c2afc7d74a4390c0c68cd25dfc945130941b11ed15084483',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Livewire/CommunityService/Proposal/TeamMemberInvitations.php',
      ),
    ),
    'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
    'name' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
    'shortName' => 'TeamMemberInvitations',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @property-read \\App\\Models\\Proposal|null $proposal
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection<int, \\App\\Models\\User> $teamMembers
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection<int, \\App\\Models\\User> $pendingInvitations
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection<int, \\App\\Models\\User> $acceptedMembers
 * @property-read \\Illuminate\\Database\\Eloquent\\Collection<int, \\App\\Models\\User> $rejectedMembers
 * Vetted by AI - Manual Review Required by Senior Engineer/Manager
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 20,
    'endLine' => 133,
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
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
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
            'startLine' => 24,
            'endLine' => 24,
            'startTokenPos' => 62,
            'startFilePos' => 865,
            'endTokenPos' => 62,
            'endFilePos' => 866,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 24,
        'endLine' => 24,
        'startColumn' => 5,
        'endColumn' => 35,
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
            'startLine' => 26,
            'endLine' => 26,
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
        'startLine' => 26,
        'endLine' => 29,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
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
        'startLine' => 31,
        'endLine' => 35,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'aliasName' => NULL,
      ),
      'teamMembers' => 
      array (
        'name' => 'teamMembers',
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
        'startLine' => 37,
        'endLine' => 43,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'aliasName' => NULL,
      ),
      'pendingInvitations' => 
      array (
        'name' => 'pendingInvitations',
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
        'startLine' => 45,
        'endLine' => 50,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'aliasName' => NULL,
      ),
      'acceptedMembers' => 
      array (
        'name' => 'acceptedMembers',
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
        'startLine' => 52,
        'endLine' => 57,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'aliasName' => NULL,
      ),
      'rejectedMembers' => 
      array (
        'name' => 'rejectedMembers',
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
        'startLine' => 59,
        'endLine' => 64,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'aliasName' => NULL,
      ),
      'allAccepted' => 
      array (
        'name' => 'allAccepted',
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
        'startLine' => 66,
        'endLine' => 73,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'aliasName' => NULL,
      ),
      'acceptInvitation' => 
      array (
        'name' => 'acceptInvitation',
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
        'endLine' => 103,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'aliasName' => NULL,
      ),
      'rejectInvitation' => 
      array (
        'name' => 'rejectInvitation',
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
        'startLine' => 105,
        'endLine' => 127,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
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
        'startLine' => 129,
        'endLine' => 132,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Livewire\\CommunityService\\Proposal',
        'declaringClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'implementingClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
        'currentClassName' => 'App\\Livewire\\CommunityService\\Proposal\\TeamMemberInvitations',
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