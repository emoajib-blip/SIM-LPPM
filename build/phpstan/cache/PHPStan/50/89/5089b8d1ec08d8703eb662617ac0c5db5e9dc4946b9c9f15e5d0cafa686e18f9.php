<?php declare(strict_types = 1);

// osfsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/Cell.php-PHPStan\BetterReflection\Reflection\ReflectionClass-PhpOffice\PhpSpreadsheet\Cell\Cell
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-79cb45393fbca083ae61678a940d053b82c0273fbfcc2fc4cefa8b4cea2a8346-8.4.1-6.65.0.9',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../phpoffice/phpspreadsheet/src/PhpSpreadsheet/Cell/Cell.php',
      ),
    ),
    'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
    'name' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
    'shortName' => 'Cell',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 18,
    'endLine' => 796,
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
      'CALCULATE_DATE_TIME_ASIS' => 
      array (
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'name' => 'CALCULATE_DATE_TIME_ASIS',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '0',
          'attributes' => 
          array (
            'startLine' => 315,
            'endLine' => 315,
            'startTokenPos' => 1296,
            'startFilePos' => 9022,
            'endTokenPos' => 1296,
            'endFilePos' => 9022,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 315,
        'endLine' => 315,
        'startColumn' => 5,
        'endColumn' => 46,
      ),
      'CALCULATE_DATE_TIME_FLOAT' => 
      array (
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'name' => 'CALCULATE_DATE_TIME_FLOAT',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '1',
          'attributes' => 
          array (
            'startLine' => 316,
            'endLine' => 316,
            'startTokenPos' => 1307,
            'startFilePos' => 9070,
            'endTokenPos' => 1307,
            'endFilePos' => 9070,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 316,
        'endLine' => 316,
        'startColumn' => 5,
        'endColumn' => 47,
      ),
      'CALCULATE_TIME_FLOAT' => 
      array (
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'name' => 'CALCULATE_TIME_FLOAT',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '2',
          'attributes' => 
          array (
            'startLine' => 317,
            'endLine' => 317,
            'startTokenPos' => 1318,
            'startFilePos' => 9113,
            'endTokenPos' => 1318,
            'endFilePos' => 9113,
          ),
        ),
        'docComment' => NULL,
        'attributes' => 
        array (
        ),
        'startLine' => 317,
        'endLine' => 317,
        'startColumn' => 5,
        'endColumn' => 42,
      ),
    ),
    'immediateProperties' => 
    array (
      'valueBinder' => 
      array (
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'name' => 'valueBinder',
        'modifiers' => 20,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * Value binder to use.
 *
 * @var IValueBinder
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 25,
        'endLine' => 25,
        'startColumn' => 5,
        'endColumn' => 32,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'value' => 
      array (
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'name' => 'value',
        'modifiers' => 4,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * Value of the cell.
 *
 * @var mixed
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 32,
        'endLine' => 32,
        'startColumn' => 5,
        'endColumn' => 19,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'calculatedValue' => 
      array (
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'name' => 'calculatedValue',
        'modifiers' => 4,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 *    Calculated value of the cell (used for caching)
 *    This returns the value last calculated by MS Excel or whichever spreadsheet program was used to
 *        create the original spreadsheet file.
 *    Note that this value is not guaranteed to reflect the actual calculated value because it is
 *        possible that auto-calculation was disabled in the original spreadsheet, and underlying data
 *        values used by the formula have changed since it was last calculated.
 *
 * @var mixed
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 44,
        'endLine' => 44,
        'startColumn' => 5,
        'endColumn' => 29,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'dataType' => 
      array (
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'name' => 'dataType',
        'modifiers' => 4,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * Type of the cell data.
 *
 * @var string
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 51,
        'endLine' => 51,
        'startColumn' => 5,
        'endColumn' => 22,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'parent' => 
      array (
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'name' => 'parent',
        'modifiers' => 4,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * The collection of cells that this cell belongs to (i.e. The Cell Collection for the parent Worksheet).
 *
 * @var ?Cells
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 58,
        'endLine' => 58,
        'startColumn' => 5,
        'endColumn' => 20,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'xfIndex' => 
      array (
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'name' => 'xfIndex',
        'modifiers' => 4,
        'type' => NULL,
        'default' => 
        array (
          'code' => '0',
          'attributes' => 
          array (
            'startLine' => 65,
            'endLine' => 65,
            'startTokenPos' => 122,
            'startFilePos' => 1864,
            'endTokenPos' => 122,
            'endFilePos' => 1864,
          ),
        ),
        'docComment' => '/**
 * Index to the cellXf reference for the styling of this cell.
 *
 * @var int
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 65,
        'endLine' => 65,
        'startColumn' => 5,
        'endColumn' => 25,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'formulaAttributes' => 
      array (
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'name' => 'formulaAttributes',
        'modifiers' => 4,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * Attributes of the formula.
 *
 * @var ?array
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 72,
        'endLine' => 72,
        'startColumn' => 5,
        'endColumn' => 31,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'ignoredErrors' => 
      array (
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'name' => 'ignoredErrors',
        'modifiers' => 4,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/** @var IgnoredErrors */',
        'attributes' => 
        array (
        ),
        'startLine' => 75,
        'endLine' => 75,
        'startColumn' => 5,
        'endColumn' => 27,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'calculateDateTimeType' => 
      array (
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'name' => 'calculateDateTimeType',
        'modifiers' => 20,
        'type' => NULL,
        'default' => 
        array (
          'code' => 'self::CALCULATE_DATE_TIME_ASIS',
          'attributes' => 
          array (
            'startLine' => 320,
            'endLine' => 320,
            'startTokenPos' => 1331,
            'startFilePos' => 9181,
            'endTokenPos' => 1333,
            'endFilePos' => 9210,
          ),
        ),
        'docComment' => '/** @var int */',
        'attributes' => 
        array (
        ),
        'startLine' => 320,
        'endLine' => 320,
        'startColumn' => 5,
        'endColumn' => 75,
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
      'updateInCollection' => 
      array (
        'name' => 'updateInCollection',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Update the cell into the cell collection.
 *
 * @return $this
 */',
        'startLine' => 82,
        'endLine' => 91,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'detach' => 
      array (
        'name' => 'detach',
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
        'startLine' => 93,
        'endLine' => 96,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'attach' => 
      array (
        'name' => 'attach',
        'parameters' => 
        array (
          'parent' => 
          array (
            'name' => 'parent',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'PhpOffice\\PhpSpreadsheet\\Collection\\Cells',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 98,
            'endLine' => 98,
            'startColumn' => 28,
            'endColumn' => 40,
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
        'startLine' => 98,
        'endLine' => 101,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      '__construct' => 
      array (
        'name' => '__construct',
        'parameters' => 
        array (
          'value' => 
          array (
            'name' => 'value',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 108,
            'endLine' => 108,
            'startColumn' => 33,
            'endColumn' => 38,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'dataType' => 
          array (
            'name' => 'dataType',
            'default' => NULL,
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 108,
            'endLine' => 108,
            'startColumn' => 41,
            'endColumn' => 57,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'worksheet' => 
          array (
            'name' => 'worksheet',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 108,
            'endLine' => 108,
            'startColumn' => 60,
            'endColumn' => 79,
            'parameterIndex' => 2,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Create a new Cell.
 *
 * @param mixed $value
 */',
        'startLine' => 108,
        'endLine' => 126,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getColumn' => 
      array (
        'name' => 'getColumn',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get cell coordinate column.
 *
 * @return string
 */',
        'startLine' => 133,
        'endLine' => 141,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getRow' => 
      array (
        'name' => 'getRow',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get cell coordinate row.
 *
 * @return int
 */',
        'startLine' => 148,
        'endLine' => 156,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getCoordinate' => 
      array (
        'name' => 'getCoordinate',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get cell coordinate.
 *
 * @return string
 */',
        'startLine' => 163,
        'endLine' => 176,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getValue' => 
      array (
        'name' => 'getValue',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get cell value.
 *
 * @return mixed
 */',
        'startLine' => 183,
        'endLine' => 186,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getFormattedValue' => 
      array (
        'name' => 'getFormattedValue',
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
        'docComment' => '/**
 * Get cell value with formatting.
 */',
        'startLine' => 191,
        'endLine' => 197,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'updateIfCellIsTableHeader' => 
      array (
        'name' => 'updateIfCellIsTableHeader',
        'parameters' => 
        array (
          'workSheet' => 
          array (
            'name' => 'workSheet',
            'default' => NULL,
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
                      'name' => 'PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet',
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 203,
            'endLine' => 203,
            'startColumn' => 57,
            'endColumn' => 77,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'cell' => 
          array (
            'name' => 'cell',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'self',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 203,
            'endLine' => 203,
            'startColumn' => 80,
            'endColumn' => 89,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'oldValue' => 
          array (
            'name' => 'oldValue',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 203,
            'endLine' => 203,
            'startColumn' => 92,
            'endColumn' => 100,
            'parameterIndex' => 2,
            'isOptional' => false,
          ),
          'newValue' => 
          array (
            'name' => 'newValue',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 203,
            'endLine' => 203,
            'startColumn' => 103,
            'endColumn' => 111,
            'parameterIndex' => 3,
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
        'docComment' => '/**
 * @param mixed $oldValue
 * @param mixed $newValue
 */',
        'startLine' => 203,
        'endLine' => 220,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 18,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'setValue' => 
      array (
        'name' => 'setValue',
        'parameters' => 
        array (
          'value' => 
          array (
            'name' => 'value',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 234,
            'endLine' => 234,
            'startColumn' => 30,
            'endColumn' => 35,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'binder' => 
          array (
            'name' => 'binder',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 234,
                'endLine' => 234,
                'startTokenPos' => 872,
                'startFilePos' => 6125,
                'endTokenPos' => 872,
                'endFilePos' => 6128,
              ),
            ),
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
                      'name' => 'PhpOffice\\PhpSpreadsheet\\Cell\\IValueBinder',
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 234,
            'endLine' => 234,
            'startColumn' => 38,
            'endColumn' => 65,
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
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set cell value.
 *
 *    Sets the value for a cell, automatically determining the datatype using the value binder
 *
 * @param mixed $value Value
 * @param null|IValueBinder $binder Value Binder to override the currently set Value Binder
 *
 * @throws Exception
 *
 * @return $this
 */',
        'startLine' => 234,
        'endLine' => 242,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'setValueExplicit' => 
      array (
        'name' => 'setValueExplicit',
        'parameters' => 
        array (
          'value' => 
          array (
            'name' => 'value',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 257,
            'endLine' => 257,
            'startColumn' => 38,
            'endColumn' => 43,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'dataType' => 
          array (
            'name' => 'dataType',
            'default' => 
            array (
              'code' => '\\PhpOffice\\PhpSpreadsheet\\Cell\\DataType::TYPE_STRING',
              'attributes' => 
              array (
                'startLine' => 257,
                'endLine' => 257,
                'startTokenPos' => 944,
                'startFilePos' => 7105,
                'endTokenPos' => 946,
                'endFilePos' => 7125,
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
            'startLine' => 257,
            'endLine' => 257,
            'startColumn' => 46,
            'endColumn' => 85,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set the value for a cell, with the explicit data type passed to the method (bypassing any use of the value binder).
 *
 * @param mixed $value Value
 * @param string $dataType Explicit data type, see DataType::TYPE_*
 *        Note that PhpSpreadsheet does not validate that the value and datatype are consistent, in using this
 *             method, then it is your responsibility as an end-user developer to validate that the value and
 *             the datatype match.
 *       If you do mismatch value and datatype, then the value you enter may be changed to match the datatype
 *          that you specify.
 *
 * @return Cell
 */',
        'startLine' => 257,
        'endLine' => 313,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getCalculateDateTimeType' => 
      array (
        'name' => 'getCalculateDateTimeType',
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
        ),
        'docComment' => NULL,
        'startLine' => 322,
        'endLine' => 325,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'setCalculateDateTimeType' => 
      array (
        'name' => 'setCalculateDateTimeType',
        'parameters' => 
        array (
          'calculateDateTimeType' => 
          array (
            'name' => 'calculateDateTimeType',
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
            'startLine' => 327,
            'endLine' => 327,
            'startColumn' => 53,
            'endColumn' => 78,
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
        'startLine' => 327,
        'endLine' => 339,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'convertDateTimeInt' => 
      array (
        'name' => 'convertDateTimeInt',
        'parameters' => 
        array (
          'result' => 
          array (
            'name' => 'result',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 348,
            'endLine' => 348,
            'startColumn' => 41,
            'endColumn' => 47,
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
 * Convert date, time, or datetime from int to float if desired.
 *
 * @param mixed $result
 *
 * @return mixed
 */',
        'startLine' => 348,
        'endLine' => 363,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getCalculatedValue' => 
      array (
        'name' => 'getCalculatedValue',
        'parameters' => 
        array (
          'resetLog' => 
          array (
            'name' => 'resetLog',
            'default' => 
            array (
              'code' => 'true',
              'attributes' => 
              array (
                'startLine' => 372,
                'endLine' => 372,
                'startTokenPos' => 1583,
                'startFilePos' => 10844,
                'endTokenPos' => 1583,
                'endFilePos' => 10847,
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
            'startLine' => 372,
            'endLine' => 372,
            'startColumn' => 40,
            'endColumn' => 60,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get calculated cell value.
 *
 * @param bool $resetLog Whether the calculation engine logger should be reset or not
 *
 * @return mixed
 */',
        'startLine' => 372,
        'endLine' => 414,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'setCalculatedValue' => 
      array (
        'name' => 'setCalculatedValue',
        'parameters' => 
        array (
          'originalValue' => 
          array (
            'name' => 'originalValue',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 421,
            'endLine' => 421,
            'startColumn' => 40,
            'endColumn' => 53,
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
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set old calculated value (cached).
 *
 * @param mixed $originalValue Value
 */',
        'startLine' => 421,
        'endLine' => 428,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getOldCalculatedValue' => 
      array (
        'name' => 'getOldCalculatedValue',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 *    Get old calculated value (cached)
 *    This returns the value last calculated by MS Excel or whichever spreadsheet program was used to
 *        create the original spreadsheet file.
 *    Note that this value is not guaranteed to reflect the actual calculated value because it is
 *        possible that auto-calculation was disabled in the original spreadsheet, and underlying data
 *        values used by the formula have changed since it was last calculated.
 *
 * @return mixed
 */',
        'startLine' => 440,
        'endLine' => 443,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getDataType' => 
      array (
        'name' => 'getDataType',
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
        'docComment' => '/**
 * Get cell data type.
 */',
        'startLine' => 448,
        'endLine' => 451,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'setDataType' => 
      array (
        'name' => 'setDataType',
        'parameters' => 
        array (
          'dataType' => 
          array (
            'name' => 'dataType',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 458,
            'endLine' => 458,
            'startColumn' => 33,
            'endColumn' => 41,
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
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set cell data type.
 *
 * @param string $dataType see DataType::TYPE_*
 */',
        'startLine' => 458,
        'endLine' => 466,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'isFormula' => 
      array (
        'name' => 'isFormula',
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
 * Identify if the cell contains a formula.
 */',
        'startLine' => 471,
        'endLine' => 474,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'hasDataValidation' => 
      array (
        'name' => 'hasDataValidation',
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
 *    Does this cell contain Data validation rules?
 */',
        'startLine' => 479,
        'endLine' => 486,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getDataValidation' => 
      array (
        'name' => 'getDataValidation',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'PhpOffice\\PhpSpreadsheet\\Cell\\DataValidation',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get Data validation rules.
 */',
        'startLine' => 491,
        'endLine' => 498,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'setDataValidation' => 
      array (
        'name' => 'setDataValidation',
        'parameters' => 
        array (
          'dataValidation' => 
          array (
            'name' => 'dataValidation',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 503,
                'endLine' => 503,
                'startTokenPos' => 2317,
                'startFilePos' => 15401,
                'endTokenPos' => 2317,
                'endFilePos' => 15404,
              ),
            ),
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
                      'name' => 'PhpOffice\\PhpSpreadsheet\\Cell\\DataValidation',
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 503,
            'endLine' => 503,
            'startColumn' => 39,
            'endColumn' => 76,
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
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set Data validation rules.
 */',
        'startLine' => 503,
        'endLine' => 512,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'hasValidValue' => 
      array (
        'name' => 'hasValidValue',
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
 * Does this cell contain valid value?
 */',
        'startLine' => 517,
        'endLine' => 522,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'hasHyperlink' => 
      array (
        'name' => 'hasHyperlink',
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
 * Does this cell contain a Hyperlink?
 */',
        'startLine' => 527,
        'endLine' => 534,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getHyperlink' => 
      array (
        'name' => 'getHyperlink',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Hyperlink',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get Hyperlink.
 */',
        'startLine' => 539,
        'endLine' => 546,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'setHyperlink' => 
      array (
        'name' => 'setHyperlink',
        'parameters' => 
        array (
          'hyperlink' => 
          array (
            'name' => 'hyperlink',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 551,
                'endLine' => 551,
                'startTokenPos' => 2556,
                'startFilePos' => 16671,
                'endTokenPos' => 2556,
                'endFilePos' => 16674,
              ),
            ),
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
                      'name' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Hyperlink',
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 551,
            'endLine' => 551,
            'startColumn' => 34,
            'endColumn' => 61,
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
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set Hyperlink.
 */',
        'startLine' => 551,
        'endLine' => 560,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getParent' => 
      array (
        'name' => 'getParent',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get cell collection.
 *
 * @return ?Cells
 */',
        'startLine' => 567,
        'endLine' => 570,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getWorksheet' => 
      array (
        'name' => 'getWorksheet',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get parent worksheet.
 */',
        'startLine' => 575,
        'endLine' => 589,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getWorksheetOrNull' => 
      array (
        'name' => 'getWorksheetOrNull',
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
                  'name' => 'PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet',
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
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 591,
        'endLine' => 601,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'isInMergeRange' => 
      array (
        'name' => 'isInMergeRange',
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
 * Is this cell in a merge range.
 */',
        'startLine' => 606,
        'endLine' => 609,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'isMergeRangeValueCell' => 
      array (
        'name' => 'isMergeRangeValueCell',
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
 * Is this cell the master (top left cell) in a merge range (that holds the actual data value).
 */',
        'startLine' => 614,
        'endLine' => 624,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getMergeRange' => 
      array (
        'name' => 'getMergeRange',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * If this cell is in a merge range, then return the range.
 *
 * @return false|string
 */',
        'startLine' => 631,
        'endLine' => 640,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getStyle' => 
      array (
        'name' => 'getStyle',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'PhpOffice\\PhpSpreadsheet\\Style\\Style',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get cell style.
 */',
        'startLine' => 645,
        'endLine' => 648,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getAppliedStyle' => 
      array (
        'name' => 'getAppliedStyle',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'PhpOffice\\PhpSpreadsheet\\Style\\Style',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get cell style.
 */',
        'startLine' => 653,
        'endLine' => 666,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'rebindParent' => 
      array (
        'name' => 'rebindParent',
        'parameters' => 
        array (
          'parent' => 
          array (
            'name' => 'parent',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 671,
            'endLine' => 671,
            'startColumn' => 34,
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
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Re-bind parent.
 */',
        'startLine' => 671,
        'endLine' => 676,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'isInRange' => 
      array (
        'name' => 'isInRange',
        'parameters' => 
        array (
          'range' => 
          array (
            'name' => 'range',
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
            'startLine' => 683,
            'endLine' => 683,
            'startColumn' => 31,
            'endColumn' => 43,
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
        'docComment' => '/**
 *    Is cell in a specific range?
 *
 * @param string $range Cell range (e.g. A1:A1)
 */',
        'startLine' => 683,
        'endLine' => 694,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'compareCells' => 
      array (
        'name' => 'compareCells',
        'parameters' => 
        array (
          'a' => 
          array (
            'name' => 'a',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'self',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 704,
            'endLine' => 704,
            'startColumn' => 41,
            'endColumn' => 47,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'b' => 
          array (
            'name' => 'b',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'self',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 704,
            'endLine' => 704,
            'startColumn' => 50,
            'endColumn' => 56,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
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
        ),
        'docComment' => '/**
 * Compare 2 cells.
 *
 * @param Cell $a Cell a
 * @param Cell $b Cell b
 *
 * @return int Result of comparison (always -1 or 1, never zero!)
 */',
        'startLine' => 704,
        'endLine' => 715,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getValueBinder' => 
      array (
        'name' => 'getValueBinder',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'PhpOffice\\PhpSpreadsheet\\Cell\\IValueBinder',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get value binder to use.
 */',
        'startLine' => 720,
        'endLine' => 727,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'setValueBinder' => 
      array (
        'name' => 'setValueBinder',
        'parameters' => 
        array (
          'binder' => 
          array (
            'name' => 'binder',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'PhpOffice\\PhpSpreadsheet\\Cell\\IValueBinder',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 732,
            'endLine' => 732,
            'startColumn' => 43,
            'endColumn' => 62,
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
        'docComment' => '/**
 * Set value binder to use.
 */',
        'startLine' => 732,
        'endLine' => 735,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      '__clone' => 
      array (
        'name' => '__clone',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Implement PHP __clone to create a deep clone, not just a shallow copy.
 */',
        'startLine' => 740,
        'endLine' => 750,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getXfIndex' => 
      array (
        'name' => 'getXfIndex',
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
        ),
        'docComment' => '/**
 * Get index to cellXf.
 */',
        'startLine' => 755,
        'endLine' => 758,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'setXfIndex' => 
      array (
        'name' => 'setXfIndex',
        'parameters' => 
        array (
          'indexValue' => 
          array (
            'name' => 'indexValue',
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
            'startLine' => 763,
            'endLine' => 763,
            'startColumn' => 32,
            'endColumn' => 46,
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
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set index to cellXf.
 */',
        'startLine' => 763,
        'endLine' => 768,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'setFormulaAttributes' => 
      array (
        'name' => 'setFormulaAttributes',
        'parameters' => 
        array (
          'attributes' => 
          array (
            'name' => 'attributes',
            'default' => NULL,
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
                      'name' => 'array',
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
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 770,
            'endLine' => 770,
            'startColumn' => 42,
            'endColumn' => 59,
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
            'name' => 'self',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 770,
        'endLine' => 775,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getFormulaAttributes' => 
      array (
        'name' => 'getFormulaAttributes',
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
                  'name' => 'array',
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
        ),
        'docComment' => NULL,
        'startLine' => 777,
        'endLine' => 780,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      '__toString' => 
      array (
        'name' => '__toString',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Convert to string.
 *
 * @return string
 */',
        'startLine' => 787,
        'endLine' => 790,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'aliasName' => NULL,
      ),
      'getIgnoredErrors' => 
      array (
        'name' => 'getIgnoredErrors',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => 
        array (
          'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
          'data' => 
          array (
            'name' => 'PhpOffice\\PhpSpreadsheet\\Cell\\IgnoredErrors',
            'isIdentifier' => false,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 792,
        'endLine' => 795,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'PhpOffice\\PhpSpreadsheet\\Cell',
        'declaringClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'implementingClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
        'currentClassName' => 'PhpOffice\\PhpSpreadsheet\\Cell\\Cell',
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