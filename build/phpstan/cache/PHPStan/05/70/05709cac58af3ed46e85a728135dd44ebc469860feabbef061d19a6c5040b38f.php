<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/tests/Feature/BudgetValidationTest.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Tests\Feature\BudgetValidationTest
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-f9e0a306df32c3d1453a529d6b460bbbc611a2fbac0c49f0a08f00b997daa176',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Tests\\Feature\\BudgetValidationTest',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/tests/Feature/BudgetValidationTest.php',
      ),
    ),
    'namespace' => 'Tests\\Feature',
    'name' => 'Tests\\Feature\\BudgetValidationTest',
    'shortName' => 'BudgetValidationTest',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 12,
    'endLine' => 122,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => 'Tests\\TestCase',
    'implementsClassNames' => 
    array (
    ),
    'traitClassNames' => 
    array (
      0 => 'Illuminate\\Foundation\\Testing\\RefreshDatabase',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'budgetService' => 
      array (
        'declaringClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'implementingClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'name' => 'budgetService',
        'modifiers' => 2,
        'type' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'App\\Services\\BudgetValidationService',
            'isIdentifier' => false,
          ),
        ),
        'default' => NULL,
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 16,
        'endLine' => 16,
        'startColumn' => 5,
        'endColumn' => 53,
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
      'setUp' => 
      array (
        'name' => 'setUp',
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
        'startLine' => 18,
        'endLine' => 23,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Tests\\Feature',
        'declaringClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'implementingClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'currentClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'aliasName' => NULL,
      ),
      'test_budget_cannot_exceed_yearly_cap' => 
      array (
        'name' => 'test_budget_cannot_exceed_yearly_cap',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 25,
        'endLine' => 48,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Tests\\Feature',
        'declaringClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'implementingClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'currentClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'aliasName' => NULL,
      ),
      'test_budget_within_cap_passes_validation' => 
      array (
        'name' => 'test_budget_within_cap_passes_validation',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 50,
        'endLine' => 72,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Tests\\Feature',
        'declaringClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'implementingClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'currentClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'aliasName' => NULL,
      ),
      'test_budget_group_cannot_exceed_allowed_percentage' => 
      array (
        'name' => 'test_budget_group_cannot_exceed_allowed_percentage',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 74,
        'endLine' => 101,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Tests\\Feature',
        'declaringClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'implementingClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'currentClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'aliasName' => NULL,
      ),
      'test_system_blocks_budget_submission_if_cap_not_set' => 
      array (
        'name' => 'test_system_blocks_budget_submission_if_cap_not_set',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 103,
        'endLine' => 121,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Tests\\Feature',
        'declaringClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'implementingClassName' => 'Tests\\Feature\\BudgetValidationTest',
        'currentClassName' => 'Tests\\Feature\\BudgetValidationTest',
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