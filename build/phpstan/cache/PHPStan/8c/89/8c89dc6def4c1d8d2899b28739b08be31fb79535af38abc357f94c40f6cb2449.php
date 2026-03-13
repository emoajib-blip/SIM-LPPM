<?php declare(strict_types = 1);

// osfsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../dompdf/dompdf/src/FontMetrics.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Dompdf\FontMetrics
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-2f95b95169317b3669c8489232b83332bf052f2de5c1e666f06964985d692888-8.4.1-6.65.0.9',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Dompdf\\FontMetrics',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../dompdf/dompdf/src/FontMetrics.php',
      ),
    ),
    'namespace' => 'Dompdf',
    'name' => 'Dompdf\\FontMetrics',
    'shortName' => 'FontMetrics',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * The font metrics class
 *
 * This class provides information about fonts and text.  It can resolve
 * font names into actual installed font files, as well as determine the
 * size of text in a particular font and size.
 *
 * @static
 * @package dompdf
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 22,
    'endLine' => 713,
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
      'USER_FONTS_FILE' => 
      array (
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'name' => 'USER_FONTS_FILE',
        'modifiers' => 1,
        'type' => NULL,
        'value' => 
        array (
          'code' => '"installed-fonts.json"',
          'attributes' => 
          array (
            'startLine' => 33,
            'endLine' => 33,
            'startTokenPos' => 34,
            'startFilePos' => 944,
            'endTokenPos' => 34,
            'endFilePos' => 965,
          ),
        ),
        'docComment' => '/**
 * Name of the user font families file
 *
 * This file must be writable by the webserver process only to update it
 * with save_font_families() after adding the .afm file references of a new font family
 * with FontMetrics::saveFontFamilies().
 * This is typically done only from command line with load_font.php on converting
 * ttf fonts to ufm with php-font-lib.
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 33,
        'endLine' => 33,
        'startColumn' => 5,
        'endColumn' => 51,
      ),
    ),
    'immediateProperties' => 
    array (
      'canvas' => 
      array (
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'name' => 'canvas',
        'modifiers' => 2,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * Underlying {@link Canvas} object to perform text size calculations
 *
 * @var Canvas
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 41,
        'endLine' => 41,
        'startColumn' => 5,
        'endColumn' => 22,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'bundledFonts' => 
      array (
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'name' => 'bundledFonts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[]',
          'attributes' => 
          array (
            'startLine' => 48,
            'endLine' => 48,
            'startTokenPos' => 52,
            'startFilePos' => 1235,
            'endTokenPos' => 53,
            'endFilePos' => 1236,
          ),
        ),
        'docComment' => '/**
 * Array of bundled font family names to variants
 *
 * @var array
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 48,
        'endLine' => 48,
        'startColumn' => 5,
        'endColumn' => 33,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'userFonts' => 
      array (
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'name' => 'userFonts',
        'modifiers' => 2,
        'type' => NULL,
        'default' => 
        array (
          'code' => '[]',
          'attributes' => 
          array (
            'startLine' => 55,
            'endLine' => 55,
            'startTokenPos' => 64,
            'startFilePos' => 1367,
            'endTokenPos' => 65,
            'endFilePos' => 1368,
          ),
        ),
        'docComment' => '/**
 * Array of user defined font family names to variants
 *
 * @var array
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 55,
        'endLine' => 55,
        'startColumn' => 5,
        'endColumn' => 30,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'fontFamilies' => 
      array (
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'name' => 'fontFamilies',
        'modifiers' => 2,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * combined list of all font families with absolute paths
 *
 * @var array
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 62,
        'endLine' => 62,
        'startColumn' => 5,
        'endColumn' => 28,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'options' => 
      array (
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'name' => 'options',
        'modifiers' => 4,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * @var Options
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 67,
        'endLine' => 67,
        'startColumn' => 5,
        'endColumn' => 21,
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
      '__construct' => 
      array (
        'name' => '__construct',
        'parameters' => 
        array (
          'canvas' => 
          array (
            'name' => 'canvas',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Dompdf\\Canvas',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 72,
            'endLine' => 72,
            'startColumn' => 33,
            'endColumn' => 46,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'options' => 
          array (
            'name' => 'options',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Dompdf\\Options',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 72,
            'endLine' => 72,
            'startColumn' => 49,
            'endColumn' => 64,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Class initialization
 */',
        'startLine' => 72,
        'endLine' => 77,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'save_font_families' => 
      array (
        'name' => 'save_font_families',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @deprecated
 */',
        'startLine' => 82,
        'endLine' => 85,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'saveFontFamilies' => 
      array (
        'name' => 'saveFontFamilies',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Saves the stored font family cache
 *
 * The name and location of the cache file are determined by {@link
 * FontMetrics::USER_FONTS_FILE}. This file should be writable by the
 * webserver process.
 *
 * @see FontMetrics::loadFontFamilies()
 */',
        'startLine' => 96,
        'endLine' => 99,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'load_font_families' => 
      array (
        'name' => 'load_font_families',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @deprecated
 */',
        'startLine' => 104,
        'endLine' => 107,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'loadFontFamilies' => 
      array (
        'name' => 'loadFontFamilies',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Loads the stored font family cache
 *
 * @see FontMetrics::saveFontFamilies()
 */',
        'startLine' => 114,
        'endLine' => 124,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'loadFontFamiliesLegacy' => 
      array (
        'name' => 'loadFontFamiliesLegacy',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => NULL,
        'startLine' => 126,
        'endLine' => 152,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'register_font' => 
      array (
        'name' => 'register_font',
        'parameters' => 
        array (
          'style' => 
          array (
            'name' => 'style',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 161,
            'endLine' => 161,
            'startColumn' => 35,
            'endColumn' => 40,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'remote_file' => 
          array (
            'name' => 'remote_file',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 161,
            'endLine' => 161,
            'startColumn' => 43,
            'endColumn' => 54,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'context' => 
          array (
            'name' => 'context',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 161,
                'endLine' => 161,
                'startTokenPos' => 576,
                'startFilePos' => 4560,
                'endTokenPos' => 576,
                'endFilePos' => 4563,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 161,
            'endLine' => 161,
            'startColumn' => 57,
            'endColumn' => 71,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param array $style
 * @param string $remote_file
 * @param resource $context
 * @return bool
 * @deprecated
 */',
        'startLine' => 161,
        'endLine' => 164,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'registerFont' => 
      array (
        'name' => 'registerFont',
        'parameters' => 
        array (
          'style' => 
          array (
            'name' => 'style',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 172,
            'endLine' => 172,
            'startColumn' => 34,
            'endColumn' => 39,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'remoteFile' => 
          array (
            'name' => 'remoteFile',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 172,
            'endLine' => 172,
            'startColumn' => 42,
            'endColumn' => 52,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'context' => 
          array (
            'name' => 'context',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 172,
                'endLine' => 172,
                'startTokenPos' => 614,
                'startFilePos' => 4830,
                'endTokenPos' => 614,
                'endFilePos' => 4833,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 172,
            'endLine' => 172,
            'startColumn' => 55,
            'endColumn' => 69,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param array $style
 * @param string $remoteFile
 * @param resource $context
 * @return bool
 */',
        'startLine' => 172,
        'endLine' => 269,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'get_text_width' => 
      array (
        'name' => 'get_text_width',
        'parameters' => 
        array (
          'text' => 
          array (
            'name' => 'text',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 280,
            'endLine' => 280,
            'startColumn' => 36,
            'endColumn' => 40,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'font' => 
          array (
            'name' => 'font',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 280,
            'endLine' => 280,
            'startColumn' => 43,
            'endColumn' => 47,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'size' => 
          array (
            'name' => 'size',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 280,
            'endLine' => 280,
            'startColumn' => 50,
            'endColumn' => 54,
            'parameterIndex' => 2,
            'isOptional' => false,
          ),
          'word_spacing' => 
          array (
            'name' => 'word_spacing',
            'default' => 
            array (
              'code' => '0.0',
              'attributes' => 
              array (
                'startLine' => 280,
                'endLine' => 280,
                'startTokenPos' => 1371,
                'startFilePos' => 8330,
                'endTokenPos' => 1371,
                'endFilePos' => 8332,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 280,
            'endLine' => 280,
            'startColumn' => 57,
            'endColumn' => 75,
            'parameterIndex' => 3,
            'isOptional' => true,
          ),
          'char_spacing' => 
          array (
            'name' => 'char_spacing',
            'default' => 
            array (
              'code' => '0.0',
              'attributes' => 
              array (
                'startLine' => 280,
                'endLine' => 280,
                'startTokenPos' => 1378,
                'startFilePos' => 8351,
                'endTokenPos' => 1378,
                'endFilePos' => 8353,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 280,
            'endLine' => 280,
            'startColumn' => 78,
            'endColumn' => 96,
            'parameterIndex' => 4,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param $text
 * @param $font
 * @param $size
 * @param float $word_spacing
 * @param float $char_spacing
 * @return float
 * @deprecated
 */',
        'startLine' => 280,
        'endLine' => 284,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'getTextWidth' => 
      array (
        'name' => 'getTextWidth',
        'parameters' => 
        array (
          'text' => 
          array (
            'name' => 'text',
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
            'startLine' => 297,
            'endLine' => 297,
            'startColumn' => 34,
            'endColumn' => 45,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'font' => 
          array (
            'name' => 'font',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 297,
            'endLine' => 297,
            'startColumn' => 48,
            'endColumn' => 52,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'size' => 
          array (
            'name' => 'size',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'float',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 297,
            'endLine' => 297,
            'startColumn' => 55,
            'endColumn' => 65,
            'parameterIndex' => 2,
            'isOptional' => false,
          ),
          'wordSpacing' => 
          array (
            'name' => 'wordSpacing',
            'default' => 
            array (
              'code' => '0.0',
              'attributes' => 
              array (
                'startLine' => 297,
                'endLine' => 297,
                'startTokenPos' => 1436,
                'startFilePos' => 9010,
                'endTokenPos' => 1436,
                'endFilePos' => 9012,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'float',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 297,
            'endLine' => 297,
            'startColumn' => 68,
            'endColumn' => 91,
            'parameterIndex' => 3,
            'isOptional' => true,
          ),
          'charSpacing' => 
          array (
            'name' => 'charSpacing',
            'default' => 
            array (
              'code' => '0.0',
              'attributes' => 
              array (
                'startLine' => 297,
                'endLine' => 297,
                'startTokenPos' => 1445,
                'startFilePos' => 9036,
                'endTokenPos' => 1445,
                'endFilePos' => 9038,
              ),
            ),
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'float',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 297,
            'endLine' => 297,
            'startColumn' => 94,
            'endColumn' => 117,
            'parameterIndex' => 4,
            'isOptional' => true,
          ),
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
        ),
        'docComment' => '/**
 * Calculates text size, in points
 *
 * @param string $text        The text to be sized
 * @param string $font        The font file to use
 * @param float  $size        The font size, in points
 * @param float  $wordSpacing Word spacing, if any
 * @param float  $charSpacing Char spacing, if any
 *
 * @return float
 */',
        'startLine' => 297,
        'endLine' => 325,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'mapTextToFonts' => 
      array (
        'name' => 'mapTextToFonts',
        'parameters' => 
        array (
          'text' => 
          array (
            'name' => 'text',
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
            'startLine' => 343,
            'endLine' => 343,
            'startColumn' => 36,
            'endColumn' => 47,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'fontFamilies' => 
          array (
            'name' => 'fontFamilies',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'array',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 343,
            'endLine' => 343,
            'startColumn' => 50,
            'endColumn' => 68,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
          'subtype' => 
          array (
            'name' => 'subtype',
            'default' => 
            array (
              'code' => '"normal"',
              'attributes' => 
              array (
                'startLine' => 343,
                'endLine' => 343,
                'startTokenPos' => 1649,
                'startFilePos' => 10808,
                'endTokenPos' => 1649,
                'endFilePos' => 10815,
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
            'startLine' => 343,
            'endLine' => 343,
            'startColumn' => 71,
            'endColumn' => 96,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
          'count' => 
          array (
            'name' => 'count',
            'default' => 
            array (
              'code' => '-1',
              'attributes' => 
              array (
                'startLine' => 343,
                'endLine' => 343,
                'startTokenPos' => 1658,
                'startFilePos' => 10831,
                'endTokenPos' => 1659,
                'endFilePos' => 10832,
              ),
            ),
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
            'startLine' => 343,
            'endLine' => 343,
            'startColumn' => 99,
            'endColumn' => 113,
            'parameterIndex' => 3,
            'isOptional' => true,
          ),
          'returnSubstring' => 
          array (
            'name' => 'returnSubstring',
            'default' => 
            array (
              'code' => 'false',
              'attributes' => 
              array (
                'startLine' => 343,
                'endLine' => 343,
                'startTokenPos' => 1668,
                'startFilePos' => 10859,
                'endTokenPos' => 1668,
                'endFilePos' => 10863,
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
            'startLine' => 343,
            'endLine' => 343,
            'startColumn' => 116,
            'endColumn' => 144,
            'parameterIndex' => 4,
            'isOptional' => true,
          ),
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
        'docComment' => '/**
 * Maps substrings of text against the provided font list. This is achieved by
 * parsing each character of the string against the supported glyphs for each
 * font. Fonts preference is based on the order of the font list.
 *
 * Returns an array containing substring information that indicates the
 * matched font (if any), start index, substring length, and (optionally)
 * the actual text of the substring.
 *
 * @param string $text            The text to map
 * @param array  $fontFamilies    List of font families to map against
 * @param string $subtype         The font subtype (italic, bold, etc.)
 * @param int    $count           The number of matches to return
 * @param bool   $returnSubstring Should the actual matched text be returned
 * @return array
 */',
        'startLine' => 343,
        'endLine' => 398,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'get_font_height' => 
      array (
        'name' => 'get_font_height',
        'parameters' => 
        array (
          'font' => 
          array (
            'name' => 'font',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 406,
            'endLine' => 406,
            'startColumn' => 37,
            'endColumn' => 41,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'size' => 
          array (
            'name' => 'size',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 406,
            'endLine' => 406,
            'startColumn' => 44,
            'endColumn' => 48,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param $font
 * @param $size
 * @return float
 * @deprecated
 */',
        'startLine' => 406,
        'endLine' => 409,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'getFontHeight' => 
      array (
        'name' => 'getFontHeight',
        'parameters' => 
        array (
          'font' => 
          array (
            'name' => 'font',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 419,
            'endLine' => 419,
            'startColumn' => 35,
            'endColumn' => 39,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'size' => 
          array (
            'name' => 'size',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'float',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 419,
            'endLine' => 419,
            'startColumn' => 42,
            'endColumn' => 52,
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
            'name' => 'float',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Calculates font height, in points
 *
 * @param string $font The font file to use
 * @param float  $size The font size, in points
 *
 * @return float
 */',
        'startLine' => 419,
        'endLine' => 422,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'getFontBaseline' => 
      array (
        'name' => 'getFontBaseline',
        'parameters' => 
        array (
          'font' => 
          array (
            'name' => 'font',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 432,
            'endLine' => 432,
            'startColumn' => 37,
            'endColumn' => 41,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'size' => 
          array (
            'name' => 'size',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'float',
                'isIdentifier' => true,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 432,
            'endLine' => 432,
            'startColumn' => 44,
            'endColumn' => 54,
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
            'name' => 'float',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Calculates font baseline, in points
 *
 * @param string $font The font file to use
 * @param float  $size The font size, in points
 *
 * @return float
 */',
        'startLine' => 432,
        'endLine' => 435,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'get_font' => 
      array (
        'name' => 'get_font',
        'parameters' => 
        array (
          'family_raw' => 
          array (
            'name' => 'family_raw',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 443,
            'endLine' => 443,
            'startColumn' => 30,
            'endColumn' => 40,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'subtype_raw' => 
          array (
            'name' => 'subtype_raw',
            'default' => 
            array (
              'code' => '"normal"',
              'attributes' => 
              array (
                'startLine' => 443,
                'endLine' => 443,
                'startTokenPos' => 2247,
                'startFilePos' => 13826,
                'endTokenPos' => 2247,
                'endFilePos' => 13833,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 443,
            'endLine' => 443,
            'startColumn' => 43,
            'endColumn' => 65,
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
 * @param $family_raw
 * @param string $subtype_raw
 * @return string
 * @deprecated
 */',
        'startLine' => 443,
        'endLine' => 446,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'getFont' => 
      array (
        'name' => 'getFont',
        'parameters' => 
        array (
          'familyRaw' => 
          array (
            'name' => 'familyRaw',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 460,
            'endLine' => 460,
            'startColumn' => 29,
            'endColumn' => 38,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'subtypeRaw' => 
          array (
            'name' => 'subtypeRaw',
            'default' => 
            array (
              'code' => '"normal"',
              'attributes' => 
              array (
                'startLine' => 460,
                'endLine' => 460,
                'startTokenPos' => 2282,
                'startFilePos' => 14449,
                'endTokenPos' => 2282,
                'endFilePos' => 14456,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 460,
            'endLine' => 460,
            'startColumn' => 41,
            'endColumn' => 62,
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
 * Resolves a font family & subtype into an actual font file
 * Subtype can be one of \'normal\', \'bold\', \'italic\' or \'bold_italic\'.  If
 * the particular font family has no suitable font file, the default font
 * ({@link Options::defaultFont}) is used.  The font file returned
 * is the absolute pathname to the font file on the system.
 *
 * @param string|null $familyRaw
 * @param string      $subtypeRaw
 *
 * @return string|null
 */',
        'startLine' => 460,
        'endLine' => 530,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'get_family' => 
      array (
        'name' => 'get_family',
        'parameters' => 
        array (
          'family' => 
          array (
            'name' => 'family',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 537,
            'endLine' => 537,
            'startColumn' => 32,
            'endColumn' => 38,
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
 * @param $family
 * @return null|string
 * @deprecated
 */',
        'startLine' => 537,
        'endLine' => 540,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'getFamily' => 
      array (
        'name' => 'getFamily',
        'parameters' => 
        array (
          'family' => 
          array (
            'name' => 'family',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 546,
            'endLine' => 546,
            'startColumn' => 31,
            'endColumn' => 37,
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
 * @param string $family
 * @return null|string
 */',
        'startLine' => 546,
        'endLine' => 556,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'get_type' => 
      array (
        'name' => 'get_type',
        'parameters' => 
        array (
          'type' => 
          array (
            'name' => 'type',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 563,
            'endLine' => 563,
            'startColumn' => 30,
            'endColumn' => 34,
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
 * @param $type
 * @return string
 * @deprecated
 */',
        'startLine' => 563,
        'endLine' => 566,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'getType' => 
      array (
        'name' => 'getType',
        'parameters' => 
        array (
          'type' => 
          array (
            'name' => 'type',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 572,
            'endLine' => 572,
            'startColumn' => 29,
            'endColumn' => 33,
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
 * @param string $type
 * @return string
 */',
        'startLine' => 572,
        'endLine' => 593,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'get_font_families' => 
      array (
        'name' => 'get_font_families',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return array
 * @deprecated
 */',
        'startLine' => 599,
        'endLine' => 602,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'getFontFamilies' => 
      array (
        'name' => 'getFontFamilies',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Returns the current font lookup table
 *
 * @return array
 */',
        'startLine' => 609,
        'endLine' => 615,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'setFontFamilies' => 
      array (
        'name' => 'setFontFamilies',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Convert loaded fonts to font lookup table
 *
 * @return array
 */',
        'startLine' => 622,
        'endLine' => 646,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'set_font_family' => 
      array (
        'name' => 'set_font_family',
        'parameters' => 
        array (
          'fontname' => 
          array (
            'name' => 'fontname',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 653,
            'endLine' => 653,
            'startColumn' => 37,
            'endColumn' => 45,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'entry' => 
          array (
            'name' => 'entry',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 653,
            'endLine' => 653,
            'startColumn' => 48,
            'endColumn' => 53,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param string $fontname
 * @param mixed $entry
 * @deprecated
 */',
        'startLine' => 653,
        'endLine' => 656,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'setFontFamily' => 
      array (
        'name' => 'setFontFamily',
        'parameters' => 
        array (
          'fontname' => 
          array (
            'name' => 'fontname',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 662,
            'endLine' => 662,
            'startColumn' => 35,
            'endColumn' => 43,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'entry' => 
          array (
            'name' => 'entry',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 662,
            'endLine' => 662,
            'startColumn' => 46,
            'endColumn' => 51,
            'parameterIndex' => 1,
            'isOptional' => false,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @param string $fontname
 * @param mixed $entry
 */',
        'startLine' => 662,
        'endLine' => 667,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'getUserFontsFilePath' => 
      array (
        'name' => 'getUserFontsFilePath',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return string
 */',
        'startLine' => 672,
        'endLine' => 675,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'setOptions' => 
      array (
        'name' => 'setOptions',
        'parameters' => 
        array (
          'options' => 
          array (
            'name' => 'options',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Dompdf\\Options',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 681,
            'endLine' => 681,
            'startColumn' => 32,
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
 * @param Options $options
 * @return $this
 */',
        'startLine' => 681,
        'endLine' => 686,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'getOptions' => 
      array (
        'name' => 'getOptions',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return Options
 */',
        'startLine' => 691,
        'endLine' => 694,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'setCanvas' => 
      array (
        'name' => 'setCanvas',
        'parameters' => 
        array (
          'canvas' => 
          array (
            'name' => 'canvas',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Dompdf\\Canvas',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 700,
            'endLine' => 700,
            'startColumn' => 31,
            'endColumn' => 44,
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
 * @param Canvas $canvas
 * @return $this
 */',
        'startLine' => 700,
        'endLine' => 704,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
        'aliasName' => NULL,
      ),
      'getCanvas' => 
      array (
        'name' => 'getCanvas',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * @return Canvas
 */',
        'startLine' => 709,
        'endLine' => 712,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Dompdf',
        'declaringClassName' => 'Dompdf\\FontMetrics',
        'implementingClassName' => 'Dompdf\\FontMetrics',
        'currentClassName' => 'Dompdf\\FontMetrics',
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