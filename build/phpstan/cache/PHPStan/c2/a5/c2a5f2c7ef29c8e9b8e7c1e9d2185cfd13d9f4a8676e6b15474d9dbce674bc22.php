<?php declare(strict_types = 1);

// osfsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Services/ProposalPdfService.php-PHPStan\BetterReflection\Reflection\ReflectionClass-App\Services\ProposalPdfService
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-eef0fe1d1cc67cca6ad9e0e27c0afc8f4c8ca1b0aa1d314cc5022d6287758687-8.4.1-6.65.0.9',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'App\\Services\\ProposalPdfService',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/app/Services/ProposalPdfService.php',
      ),
    ),
    'namespace' => 'App\\Services',
    'name' => 'App\\Services\\ProposalPdfService',
    'shortName' => 'ProposalPdfService',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 10,
    'endLine' => 615,
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
    ),
    'immediateMethods' => 
    array (
      'export' => 
      array (
        'name' => 'export',
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
            'startLine' => 18,
            'endLine' => 18,
            'startColumn' => 28,
            'endColumn' => 45,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'isPreview' => 
          array (
            'name' => 'isPreview',
            'default' => 
            array (
              'code' => 'false',
              'attributes' => 
              array (
                'startLine' => 18,
                'endLine' => 18,
                'startTokenPos' => 52,
                'startFilePos' => 434,
                'endTokenPos' => 52,
                'endFilePos' => 438,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'bool',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 18,
            'endLine' => 18,
            'startColumn' => 48,
            'endColumn' => 70,
            'parameterIndex' => 1,
            'isOptional' => true,
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
        'docComment' => '/**
 * Export the proposal to a combined PDF.
 * Uses caching to avoid regenerating the same PDF multiple times.
 *
 * @return string Path to the combined PDF file
 */',
        'startLine' => 18,
        'endLine' => 319,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Services',
        'declaringClassName' => 'App\\Services\\ProposalPdfService',
        'implementingClassName' => 'App\\Services\\ProposalPdfService',
        'currentClassName' => 'App\\Services\\ProposalPdfService',
        'aliasName' => NULL,
      ),
      'exportReport' => 
      array (
        'name' => 'exportReport',
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
            'startLine' => 324,
            'endLine' => 324,
            'startColumn' => 34,
            'endColumn' => 51,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'report' => 
          array (
            'name' => 'report',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'App\\Models\\ProgressReport',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 324,
            'endLine' => 324,
            'startColumn' => 54,
            'endColumn' => 87,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'isPreview' => 
          array (
            'name' => 'isPreview',
            'default' => 
            array (
              'code' => 'false',
              'attributes' => 
              array (
                'startLine' => 324,
                'endLine' => 324,
                'startTokenPos' => 2672,
                'startFilePos' => 14141,
                'endTokenPos' => 2672,
                'endFilePos' => 14145,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'bool',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 324,
            'endLine' => 324,
            'startColumn' => 90,
            'endColumn' => 112,
            'parameterIndex' => 2,
            'isOptional' => true,
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
        'docComment' => '/**
 * Export a report to PDF.
 */',
        'startLine' => 324,
        'endLine' => 614,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'App\\Services',
        'declaringClassName' => 'App\\Services\\ProposalPdfService',
        'implementingClassName' => 'App\\Services\\ProposalPdfService',
        'currentClassName' => 'App\\Services\\ProposalPdfService',
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