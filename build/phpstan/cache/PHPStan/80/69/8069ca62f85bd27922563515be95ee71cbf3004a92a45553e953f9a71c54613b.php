<?php declare(strict_types = 1);

// osfsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../laravel/framework/src/Illuminate/Testing/TestResponse.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Illuminate\Testing\TestResponse
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-2a43abbc5b2df91a69b5f2fa2957f7599f8a6bf86fb4997806119abfbfcedcbb-8.4.1-6.65.0.9',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Illuminate\\Testing\\TestResponse',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../laravel/framework/src/Illuminate/Testing/TestResponse.php',
      ),
    ),
    'namespace' => 'Illuminate\\Testing',
    'name' => 'Illuminate\\Testing\\TestResponse',
    'shortName' => 'TestResponse',
    'isInterface' => false,
    'isTrait' => false,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => '/**
 * @template TResponse of \\Symfony\\Component\\HttpFoundation\\Response
 *
 * @mixin \\Illuminate\\Http\\Response
 */',
    'attributes' => 
    array (
    ),
    'startLine' => 35,
    'endLine' => 2002,
    'startColumn' => 1,
    'endColumn' => 1,
    'parentClassName' => NULL,
    'implementsClassNames' => 
    array (
      0 => 'ArrayAccess',
    ),
    'traitClassNames' => 
    array (
      0 => 'Illuminate\\Testing\\Concerns\\AssertsStatusCodes',
      1 => 'Illuminate\\Support\\Traits\\Conditionable',
      2 => 'Illuminate\\Support\\Traits\\Dumpable',
      3 => 'Illuminate\\Support\\Traits\\Tappable',
      4 => 'Illuminate\\Support\\Traits\\Macroable',
    ),
    'immediateConstants' => 
    array (
    ),
    'immediateProperties' => 
    array (
      'baseRequest' => 
      array (
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'name' => 'baseRequest',
        'modifiers' => 1,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * The original request.
 *
 * @var \\Illuminate\\Http\\Request|null
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 46,
        'endLine' => 46,
        'startColumn' => 5,
        'endColumn' => 24,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'baseResponse' => 
      array (
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'name' => 'baseResponse',
        'modifiers' => 1,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * The response to delegate to.
 *
 * @var TResponse
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 53,
        'endLine' => 53,
        'startColumn' => 5,
        'endColumn' => 25,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'exceptions' => 
      array (
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'name' => 'exceptions',
        'modifiers' => 1,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * The collection of logged exceptions for the request.
 *
 * @var \\Illuminate\\Support\\Collection
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 60,
        'endLine' => 60,
        'startColumn' => 5,
        'endColumn' => 23,
        'isPromoted' => false,
        'declaredAtCompileTime' => true,
        'immediateVirtual' => false,
        'immediateHooks' => 
        array (
        ),
      ),
      'streamedContent' => 
      array (
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'name' => 'streamedContent',
        'modifiers' => 2,
        'type' => NULL,
        'default' => NULL,
        'docComment' => '/**
 * The streamed content of the response.
 *
 * @var string
 */',
        'attributes' => 
        array (
        ),
        'startLine' => 67,
        'endLine' => 67,
        'startColumn' => 5,
        'endColumn' => 31,
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
          'response' => 
          array (
            'name' => 'response',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 75,
            'endLine' => 75,
            'startColumn' => 33,
            'endColumn' => 41,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'request' => 
          array (
            'name' => 'request',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 75,
                'endLine' => 75,
                'startTokenPos' => 217,
                'startFilePos' => 1969,
                'endTokenPos' => 217,
                'endFilePos' => 1972,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 75,
            'endLine' => 75,
            'startColumn' => 44,
            'endColumn' => 58,
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
 * Create a new test response instance.
 *
 * @param  TResponse  $response
 * @param  \\Illuminate\\Http\\Request|null  $request
 */',
        'startLine' => 75,
        'endLine' => 80,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'fromBaseResponse' => 
      array (
        'name' => 'fromBaseResponse',
        'parameters' => 
        array (
          'response' => 
          array (
            'name' => 'response',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 91,
            'endLine' => 91,
            'startColumn' => 45,
            'endColumn' => 53,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'request' => 
          array (
            'name' => 'request',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 91,
                'endLine' => 91,
                'startTokenPos' => 270,
                'startFilePos' => 2404,
                'endTokenPos' => 270,
                'endFilePos' => 2407,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 91,
            'endLine' => 91,
            'startColumn' => 56,
            'endColumn' => 70,
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
 * Create a new TestResponse from another response.
 *
 * @template R of TResponse
 *
 * @param  R  $response
 * @param  \\Illuminate\\Http\\Request|null  $request
 * @return static<R>
 */',
        'startLine' => 91,
        'endLine' => 94,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 17,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSuccessful' => 
      array (
        'name' => 'assertSuccessful',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Assert that the response has a successful status code.
 *
 * @return $this
 */',
        'startLine' => 101,
        'endLine' => 109,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSuccessfulPrecognition' => 
      array (
        'name' => 'assertSuccessfulPrecognition',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Assert that the Precognition request was successful.
 *
 * @return $this
 */',
        'startLine' => 116,
        'endLine' => 132,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertClientError' => 
      array (
        'name' => 'assertClientError',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Assert that the response is a client error.
 *
 * @return $this
 */',
        'startLine' => 139,
        'endLine' => 147,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertServerError' => 
      array (
        'name' => 'assertServerError',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Assert that the response is a server error.
 *
 * @return $this
 */',
        'startLine' => 154,
        'endLine' => 162,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertStatus' => 
      array (
        'name' => 'assertStatus',
        'parameters' => 
        array (
          'status' => 
          array (
            'name' => 'status',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 170,
            'endLine' => 170,
            'startColumn' => 34,
            'endColumn' => 40,
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
 * Assert that the response has the given status code.
 *
 * @param  int  $status
 * @return $this
 */',
        'startLine' => 170,
        'endLine' => 177,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'statusMessageWithDetails' => 
      array (
        'name' => 'statusMessageWithDetails',
        'parameters' => 
        array (
          'expected' => 
          array (
            'name' => 'expected',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 186,
            'endLine' => 186,
            'startColumn' => 49,
            'endColumn' => 57,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'actual' => 
          array (
            'name' => 'actual',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 186,
            'endLine' => 186,
            'startColumn' => 60,
            'endColumn' => 66,
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
 * Get an assertion message for a status assertion containing extra details when available.
 *
 * @param  string|int  $expected
 * @param  string|int  $actual
 * @return string
 */',
        'startLine' => 186,
        'endLine' => 189,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertRedirect' => 
      array (
        'name' => 'assertRedirect',
        'parameters' => 
        array (
          'uri' => 
          array (
            'name' => 'uri',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 197,
                'endLine' => 197,
                'startTokenPos' => 635,
                'startFilePos' => 5121,
                'endTokenPos' => 635,
                'endFilePos' => 5124,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 197,
            'endLine' => 197,
            'startColumn' => 36,
            'endColumn' => 46,
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
 * Assert whether the response is redirecting to a given URI.
 *
 * @param  string|null  $uri
 * @return $this
 */',
        'startLine' => 197,
        'endLine' => 209,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertRedirectContains' => 
      array (
        'name' => 'assertRedirectContains',
        'parameters' => 
        array (
          'uri' => 
          array (
            'name' => 'uri',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 217,
            'endLine' => 217,
            'startColumn' => 44,
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
 * Assert whether the response is redirecting to a URI that contains the given URI.
 *
 * @param  string  $uri
 * @return $this
 */',
        'startLine' => 217,
        'endLine' => 229,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertRedirectBack' => 
      array (
        'name' => 'assertRedirectBack',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Assert whether the response is redirecting back to the previous location.
 *
 * @return $this
 */',
        'startLine' => 236,
        'endLine' => 246,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertRedirectBackWithErrors' => 
      array (
        'name' => 'assertRedirectBackWithErrors',
        'parameters' => 
        array (
          'keys' => 
          array (
            'name' => 'keys',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 256,
                'endLine' => 256,
                'startTokenPos' => 889,
                'startFilePos' => 6866,
                'endTokenPos' => 890,
                'endFilePos' => 6867,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 256,
            'endLine' => 256,
            'startColumn' => 50,
            'endColumn' => 59,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'format' => 
          array (
            'name' => 'format',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 256,
                'endLine' => 256,
                'startTokenPos' => 897,
                'startFilePos' => 6880,
                'endTokenPos' => 897,
                'endFilePos' => 6883,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 256,
            'endLine' => 256,
            'startColumn' => 62,
            'endColumn' => 75,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'errorBag' => 
          array (
            'name' => 'errorBag',
            'default' => 
            array (
              'code' => '\'default\'',
              'attributes' => 
              array (
                'startLine' => 256,
                'endLine' => 256,
                'startTokenPos' => 904,
                'startFilePos' => 6898,
                'endTokenPos' => 904,
                'endFilePos' => 6906,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 256,
            'endLine' => 256,
            'startColumn' => 78,
            'endColumn' => 98,
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
 * Assert whether the response is redirecting back to the previous location with the given errors in the session.
 *
 * @param  string|array  $keys
 * @param  mixed  $format
 * @param  string  $errorBag
 * @return $this
 */',
        'startLine' => 256,
        'endLine' => 263,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertRedirectBackWithoutErrors' => 
      array (
        'name' => 'assertRedirectBackWithoutErrors',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Assert whether the response is redirecting back to the previous location with no errors in the session.
 *
 * @return $this
 */',
        'startLine' => 270,
        'endLine' => 277,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertRedirectToRoute' => 
      array (
        'name' => 'assertRedirectToRoute',
        'parameters' => 
        array (
          'name' => 
          array (
            'name' => 'name',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 286,
            'endLine' => 286,
            'startColumn' => 43,
            'endColumn' => 47,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'parameters' => 
          array (
            'name' => 'parameters',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 286,
                'endLine' => 286,
                'startTokenPos' => 985,
                'startFilePos' => 7625,
                'endTokenPos' => 986,
                'endFilePos' => 7626,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 286,
            'endLine' => 286,
            'startColumn' => 50,
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
 * Assert whether the response is redirecting to a given route.
 *
 * @param  \\BackedEnum|string  $name
 * @param  mixed  $parameters
 * @return $this
 */',
        'startLine' => 286,
        'endLine' => 298,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertRedirectToSignedRoute' => 
      array (
        'name' => 'assertRedirectToSignedRoute',
        'parameters' => 
        array (
          'name' => 
          array (
            'name' => 'name',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 308,
                'endLine' => 308,
                'startTokenPos' => 1066,
                'startFilePos' => 8227,
                'endTokenPos' => 1066,
                'endFilePos' => 8230,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 308,
            'endLine' => 308,
            'startColumn' => 49,
            'endColumn' => 60,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'parameters' => 
          array (
            'name' => 'parameters',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 308,
                'endLine' => 308,
                'startTokenPos' => 1073,
                'startFilePos' => 8247,
                'endTokenPos' => 1074,
                'endFilePos' => 8248,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 308,
            'endLine' => 308,
            'startColumn' => 63,
            'endColumn' => 78,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'absolute' => 
          array (
            'name' => 'absolute',
            'default' => 
            array (
              'code' => 'true',
              'attributes' => 
              array (
                'startLine' => 308,
                'endLine' => 308,
                'startTokenPos' => 1081,
                'startFilePos' => 8263,
                'endTokenPos' => 1081,
                'endFilePos' => 8266,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 308,
            'endLine' => 308,
            'startColumn' => 81,
            'endColumn' => 96,
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
 * Assert whether the response is redirecting to a given signed route.
 *
 * @param  \\BackedEnum|string|null  $name
 * @param  mixed  $parameters
 * @param  bool  $absolute
 * @return $this
 */',
        'startLine' => 308,
        'endLine' => 337,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertRedirectToAction' => 
      array (
        'name' => 'assertRedirectToAction',
        'parameters' => 
        array (
          'name' => 
          array (
            'name' => 'name',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 346,
            'endLine' => 346,
            'startColumn' => 44,
            'endColumn' => 48,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'parameters' => 
          array (
            'name' => 'parameters',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 346,
                'endLine' => 346,
                'startTokenPos' => 1288,
                'startFilePos' => 9404,
                'endTokenPos' => 1289,
                'endFilePos' => 9405,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 346,
            'endLine' => 346,
            'startColumn' => 51,
            'endColumn' => 66,
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
 * Assert whether the response is redirecting to a given controller action.
 *
 * @param  string|array  $name
 * @param  array  $parameters
 * @return $this
 */',
        'startLine' => 346,
        'endLine' => 358,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertHeader' => 
      array (
        'name' => 'assertHeader',
        'parameters' => 
        array (
          'headerName' => 
          array (
            'name' => 'headerName',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 367,
            'endLine' => 367,
            'startColumn' => 34,
            'endColumn' => 44,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'value' => 
          array (
            'name' => 'value',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 367,
                'endLine' => 367,
                'startTokenPos' => 1372,
                'startFilePos' => 9974,
                'endTokenPos' => 1372,
                'endFilePos' => 9977,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 367,
            'endLine' => 367,
            'startColumn' => 47,
            'endColumn' => 59,
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
 * Asserts that the response contains the given header and equals the optional value.
 *
 * @param  string  $headerName
 * @param  mixed  $value
 * @return $this
 */',
        'startLine' => 367,
        'endLine' => 383,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertHeaderContains' => 
      array (
        'name' => 'assertHeaderContains',
        'parameters' => 
        array (
          'headerName' => 
          array (
            'name' => 'headerName',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 392,
            'endLine' => 392,
            'startColumn' => 42,
            'endColumn' => 52,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
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
            'startLine' => 392,
            'endLine' => 392,
            'startColumn' => 55,
            'endColumn' => 60,
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
 * Asserts that the response contains the given header and that its value contains the given string.
 *
 * @param  string  $headerName
 * @param  string  $value
 * @return $this
 */',
        'startLine' => 392,
        'endLine' => 406,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertHeaderMissing' => 
      array (
        'name' => 'assertHeaderMissing',
        'parameters' => 
        array (
          'headerName' => 
          array (
            'name' => 'headerName',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 414,
            'endLine' => 414,
            'startColumn' => 41,
            'endColumn' => 51,
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
 * Asserts that the response does not contain the given header.
 *
 * @param  string  $headerName
 * @return $this
 */',
        'startLine' => 414,
        'endLine' => 421,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertLocation' => 
      array (
        'name' => 'assertLocation',
        'parameters' => 
        array (
          'uri' => 
          array (
            'name' => 'uri',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 429,
            'endLine' => 429,
            'startColumn' => 36,
            'endColumn' => 39,
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
 * Assert that the current location header matches the given URI.
 *
 * @param  string  $uri
 * @return $this
 */',
        'startLine' => 429,
        'endLine' => 436,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertDownload' => 
      array (
        'name' => 'assertDownload',
        'parameters' => 
        array (
          'filename' => 
          array (
            'name' => 'filename',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 444,
                'endLine' => 444,
                'startTokenPos' => 1724,
                'startFilePos' => 12194,
                'endTokenPos' => 1724,
                'endFilePos' => 12197,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 444,
            'endLine' => 444,
            'startColumn' => 36,
            'endColumn' => 51,
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
 * Assert that the response offers a file download.
 *
 * @param  string|null  $filename
 * @return $this
 */',
        'startLine' => 444,
        'endLine' => 484,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertPlainCookie' => 
      array (
        'name' => 'assertPlainCookie',
        'parameters' => 
        array (
          'cookieName' => 
          array (
            'name' => 'cookieName',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 493,
            'endLine' => 493,
            'startColumn' => 39,
            'endColumn' => 49,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'value' => 
          array (
            'name' => 'value',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 493,
                'endLine' => 493,
                'startTokenPos' => 2053,
                'startFilePos' => 14035,
                'endTokenPos' => 2053,
                'endFilePos' => 14038,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 493,
            'endLine' => 493,
            'startColumn' => 52,
            'endColumn' => 64,
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
 * Asserts that the response contains the given cookie and equals the optional value.
 *
 * @param  string  $cookieName
 * @param  mixed  $value
 * @return $this
 */',
        'startLine' => 493,
        'endLine' => 498,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertCookie' => 
      array (
        'name' => 'assertCookie',
        'parameters' => 
        array (
          'cookieName' => 
          array (
            'name' => 'cookieName',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 509,
            'endLine' => 509,
            'startColumn' => 34,
            'endColumn' => 44,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'value' => 
          array (
            'name' => 'value',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 509,
                'endLine' => 509,
                'startTokenPos' => 2094,
                'startFilePos' => 14453,
                'endTokenPos' => 2094,
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
            'startLine' => 509,
            'endLine' => 509,
            'startColumn' => 47,
            'endColumn' => 59,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'encrypted' => 
          array (
            'name' => 'encrypted',
            'default' => 
            array (
              'code' => 'true',
              'attributes' => 
              array (
                'startLine' => 509,
                'endLine' => 509,
                'startTokenPos' => 2101,
                'startFilePos' => 14472,
                'endTokenPos' => 2101,
                'endFilePos' => 14475,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 509,
            'endLine' => 509,
            'startColumn' => 62,
            'endColumn' => 78,
            'parameterIndex' => 2,
            'isOptional' => true,
          ),
          'unserialize' => 
          array (
            'name' => 'unserialize',
            'default' => 
            array (
              'code' => 'false',
              'attributes' => 
              array (
                'startLine' => 509,
                'endLine' => 509,
                'startTokenPos' => 2108,
                'startFilePos' => 14493,
                'endTokenPos' => 2108,
                'endFilePos' => 14497,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 509,
            'endLine' => 509,
            'startColumn' => 81,
            'endColumn' => 100,
            'parameterIndex' => 3,
            'isOptional' => true,
          ),
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Asserts that the response contains the given cookie and equals the optional value.
 *
 * @param  string  $cookieName
 * @param  mixed  $value
 * @param  bool  $encrypted
 * @param  bool  $unserialize
 * @return $this
 */',
        'startLine' => 509,
        'endLine' => 528,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertCookieExpired' => 
      array (
        'name' => 'assertCookieExpired',
        'parameters' => 
        array (
          'cookieName' => 
          array (
            'name' => 'cookieName',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 536,
            'endLine' => 536,
            'startColumn' => 41,
            'endColumn' => 51,
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
 * Asserts that the response contains the given cookie and is expired.
 *
 * @param  string  $cookieName
 * @return $this
 */',
        'startLine' => 536,
        'endLine' => 551,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertCookieNotExpired' => 
      array (
        'name' => 'assertCookieNotExpired',
        'parameters' => 
        array (
          'cookieName' => 
          array (
            'name' => 'cookieName',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 559,
            'endLine' => 559,
            'startColumn' => 44,
            'endColumn' => 54,
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
 * Asserts that the response contains the given cookie and is not expired.
 *
 * @param  string  $cookieName
 * @return $this
 */',
        'startLine' => 559,
        'endLine' => 574,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertCookieMissing' => 
      array (
        'name' => 'assertCookieMissing',
        'parameters' => 
        array (
          'cookieName' => 
          array (
            'name' => 'cookieName',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 582,
            'endLine' => 582,
            'startColumn' => 41,
            'endColumn' => 51,
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
 * Asserts that the response does not contain the given cookie.
 *
 * @param  string  $cookieName
 * @return $this
 */',
        'startLine' => 582,
        'endLine' => 590,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'getCookie' => 
      array (
        'name' => 'getCookie',
        'parameters' => 
        array (
          'cookieName' => 
          array (
            'name' => 'cookieName',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 600,
            'endLine' => 600,
            'startColumn' => 31,
            'endColumn' => 41,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'decrypt' => 
          array (
            'name' => 'decrypt',
            'default' => 
            array (
              'code' => 'true',
              'attributes' => 
              array (
                'startLine' => 600,
                'endLine' => 600,
                'startTokenPos' => 2557,
                'startFilePos' => 17316,
                'endTokenPos' => 2557,
                'endFilePos' => 17319,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 600,
            'endLine' => 600,
            'startColumn' => 44,
            'endColumn' => 58,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'unserialize' => 
          array (
            'name' => 'unserialize',
            'default' => 
            array (
              'code' => 'false',
              'attributes' => 
              array (
                'startLine' => 600,
                'endLine' => 600,
                'startTokenPos' => 2564,
                'startFilePos' => 17337,
                'endTokenPos' => 2564,
                'endFilePos' => 17341,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 600,
            'endLine' => 600,
            'startColumn' => 61,
            'endColumn' => 80,
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
 * Get the given cookie from the response.
 *
 * @param  string  $cookieName
 * @param  bool  $decrypt
 * @param  bool  $unserialize
 * @return \\Symfony\\Component\\HttpFoundation\\Cookie|null
 */',
        'startLine' => 600,
        'endLine' => 626,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertContent' => 
      array (
        'name' => 'assertContent',
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
            'startLine' => 634,
            'endLine' => 634,
            'startColumn' => 35,
            'endColumn' => 40,
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
 * Assert that the given string matches the response content.
 *
 * @param  string  $value
 * @return $this
 */',
        'startLine' => 634,
        'endLine' => 639,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertStreamed' => 
      array (
        'name' => 'assertStreamed',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Assert that the response was streamed.
 *
 * @return $this
 */',
        'startLine' => 646,
        'endLine' => 654,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertNotStreamed' => 
      array (
        'name' => 'assertNotStreamed',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Assert that the response was not streamed.
 *
 * @return $this
 */',
        'startLine' => 661,
        'endLine' => 669,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertStreamedContent' => 
      array (
        'name' => 'assertStreamedContent',
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
            'startLine' => 677,
            'endLine' => 677,
            'startColumn' => 43,
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
 * Assert that the given string matches the streamed response content.
 *
 * @param  string  $value
 * @return $this
 */',
        'startLine' => 677,
        'endLine' => 682,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertStreamedJsonContent' => 
      array (
        'name' => 'assertStreamedJsonContent',
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
            'startLine' => 690,
            'endLine' => 690,
            'startColumn' => 47,
            'endColumn' => 52,
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
 * Assert that the given array matches the streamed JSON response content.
 *
 * @param  array  $value
 * @return $this
 */',
        'startLine' => 690,
        'endLine' => 693,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSee' => 
      array (
        'name' => 'assertSee',
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
            'startLine' => 702,
            'endLine' => 702,
            'startColumn' => 31,
            'endColumn' => 36,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'escape' => 
          array (
            'name' => 'escape',
            'default' => 
            array (
              'code' => 'true',
              'attributes' => 
              array (
                'startLine' => 702,
                'endLine' => 702,
                'startTokenPos' => 2966,
                'startFilePos' => 20196,
                'endTokenPos' => 2966,
                'endFilePos' => 20199,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 702,
            'endLine' => 702,
            'startColumn' => 39,
            'endColumn' => 52,
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
 * Assert that the given string or array of strings are contained within the response.
 *
 * @param  string|array  $value
 * @param  bool  $escape
 * @return $this
 */',
        'startLine' => 702,
        'endLine' => 713,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSeeHtml' => 
      array (
        'name' => 'assertSeeHtml',
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
            'startLine' => 721,
            'endLine' => 721,
            'startColumn' => 35,
            'endColumn' => 40,
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
 * Assert that the given HTML string or array of HTML strings are contained within the response.
 *
 * @param  array|string  $value
 * @return $this
 */',
        'startLine' => 721,
        'endLine' => 724,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSeeInOrder' => 
      array (
        'name' => 'assertSeeInOrder',
        'parameters' => 
        array (
          'values' => 
          array (
            'name' => 'values',
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
            'startLine' => 733,
            'endLine' => 733,
            'startColumn' => 38,
            'endColumn' => 50,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'escape' => 
          array (
            'name' => 'escape',
            'default' => 
            array (
              'code' => 'true',
              'attributes' => 
              array (
                'startLine' => 733,
                'endLine' => 733,
                'startTokenPos' => 3095,
                'startFilePos' => 21026,
                'endTokenPos' => 3095,
                'endFilePos' => 21029,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 733,
            'endLine' => 733,
            'startColumn' => 53,
            'endColumn' => 66,
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
 * Assert that the given strings are contained in order within the response.
 *
 * @param  array  $values
 * @param  bool  $escape
 * @return $this
 */',
        'startLine' => 733,
        'endLine' => 740,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSeeHtmlInOrder' => 
      array (
        'name' => 'assertSeeHtmlInOrder',
        'parameters' => 
        array (
          'values' => 
          array (
            'name' => 'values',
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
            'startLine' => 748,
            'endLine' => 748,
            'startColumn' => 42,
            'endColumn' => 54,
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
 * Assert that the given HTML strings are contained in order within the response.
 *
 * @param  array  $values
 * @return $this
 */',
        'startLine' => 748,
        'endLine' => 751,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSeeText' => 
      array (
        'name' => 'assertSeeText',
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
            'startLine' => 760,
            'endLine' => 760,
            'startColumn' => 35,
            'endColumn' => 40,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'escape' => 
          array (
            'name' => 'escape',
            'default' => 
            array (
              'code' => 'true',
              'attributes' => 
              array (
                'startLine' => 760,
                'endLine' => 760,
                'startTokenPos' => 3201,
                'startFilePos' => 21773,
                'endTokenPos' => 3201,
                'endFilePos' => 21776,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 760,
            'endLine' => 760,
            'startColumn' => 43,
            'endColumn' => 56,
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
 * Assert that the given string or array of strings are contained within the response text.
 *
 * @param  string|array  $value
 * @param  bool  $escape
 * @return $this
 */',
        'startLine' => 760,
        'endLine' => 773,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSeeTextInOrder' => 
      array (
        'name' => 'assertSeeTextInOrder',
        'parameters' => 
        array (
          'values' => 
          array (
            'name' => 'values',
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
            'startLine' => 782,
            'endLine' => 782,
            'startColumn' => 42,
            'endColumn' => 54,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'escape' => 
          array (
            'name' => 'escape',
            'default' => 
            array (
              'code' => 'true',
              'attributes' => 
              array (
                'startLine' => 782,
                'endLine' => 782,
                'startTokenPos' => 3312,
                'startFilePos' => 22370,
                'endTokenPos' => 3312,
                'endFilePos' => 22373,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 782,
            'endLine' => 782,
            'startColumn' => 57,
            'endColumn' => 70,
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
 * Assert that the given strings are contained in order within the response text.
 *
 * @param  array  $values
 * @param  bool  $escape
 * @return $this
 */',
        'startLine' => 782,
        'endLine' => 789,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertDontSee' => 
      array (
        'name' => 'assertDontSee',
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
            'startLine' => 798,
            'endLine' => 798,
            'startColumn' => 35,
            'endColumn' => 40,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'escape' => 
          array (
            'name' => 'escape',
            'default' => 
            array (
              'code' => 'true',
              'attributes' => 
              array (
                'startLine' => 798,
                'endLine' => 798,
                'startTokenPos' => 3391,
                'startFilePos' => 22843,
                'endTokenPos' => 3391,
                'endFilePos' => 22846,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 798,
            'endLine' => 798,
            'startColumn' => 43,
            'endColumn' => 56,
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
 * Assert that the given string or array of strings are not contained within the response.
 *
 * @param  string|array  $value
 * @param  bool  $escape
 * @return $this
 */',
        'startLine' => 798,
        'endLine' => 809,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertDontSeeHtml' => 
      array (
        'name' => 'assertDontSeeHtml',
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
            'startLine' => 817,
            'endLine' => 817,
            'startColumn' => 39,
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
 * Assert that the given HTML string or array of HTML strings are not contained within the response.
 *
 * @param  array|string  $value
 * @return $this
 */',
        'startLine' => 817,
        'endLine' => 820,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertDontSeeText' => 
      array (
        'name' => 'assertDontSeeText',
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
            'startLine' => 829,
            'endLine' => 829,
            'startColumn' => 39,
            'endColumn' => 44,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'escape' => 
          array (
            'name' => 'escape',
            'default' => 
            array (
              'code' => 'true',
              'attributes' => 
              array (
                'startLine' => 829,
                'endLine' => 829,
                'startTokenPos' => 3518,
                'startFilePos' => 23707,
                'endTokenPos' => 3518,
                'endFilePos' => 23710,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 829,
            'endLine' => 829,
            'startColumn' => 47,
            'endColumn' => 60,
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
 * Assert that the given string or array of strings are not contained within the response text.
 *
 * @param  string|array  $value
 * @param  bool  $escape
 * @return $this
 */',
        'startLine' => 829,
        'endLine' => 842,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJson' => 
      array (
        'name' => 'assertJson',
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
            'startLine' => 851,
            'endLine' => 851,
            'startColumn' => 32,
            'endColumn' => 37,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'strict' => 
          array (
            'name' => 'strict',
            'default' => 
            array (
              'code' => 'false',
              'attributes' => 
              array (
                'startLine' => 851,
                'endLine' => 851,
                'startTokenPos' => 3627,
                'startFilePos' => 24277,
                'endTokenPos' => 3627,
                'endFilePos' => 24281,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 851,
            'endLine' => 851,
            'startColumn' => 40,
            'endColumn' => 54,
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
 * Assert that the response is a superset of the given JSON.
 *
 * @param  array|callable  $value
 * @param  bool  $strict
 * @return $this
 */',
        'startLine' => 851,
        'endLine' => 868,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonPath' => 
      array (
        'name' => 'assertJsonPath',
        'parameters' => 
        array (
          'path' => 
          array (
            'name' => 'path',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 877,
            'endLine' => 877,
            'startColumn' => 36,
            'endColumn' => 40,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'expect' => 
          array (
            'name' => 'expect',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 877,
            'endLine' => 877,
            'startColumn' => 43,
            'endColumn' => 49,
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
 * Assert that the expected value and type exists at the given path in the response.
 *
 * @param  string  $path
 * @param  mixed  $expect
 * @return $this
 */',
        'startLine' => 877,
        'endLine' => 882,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonPathCanonicalizing' => 
      array (
        'name' => 'assertJsonPathCanonicalizing',
        'parameters' => 
        array (
          'path' => 
          array (
            'name' => 'path',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 891,
            'endLine' => 891,
            'startColumn' => 50,
            'endColumn' => 54,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'expect' => 
          array (
            'name' => 'expect',
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
            'startLine' => 891,
            'endLine' => 891,
            'startColumn' => 57,
            'endColumn' => 69,
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
 * Assert that the given path in the response contains all of the expected values without looking at the order.
 *
 * @param  string  $path
 * @param  array  $expect
 * @return $this
 */',
        'startLine' => 891,
        'endLine' => 896,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertExactJson' => 
      array (
        'name' => 'assertExactJson',
        'parameters' => 
        array (
          'data' => 
          array (
            'name' => 'data',
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
            'startLine' => 904,
            'endLine' => 904,
            'startColumn' => 37,
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
 * Assert that the response has the exact given JSON.
 *
 * @param  array  $data
 * @return $this
 */',
        'startLine' => 904,
        'endLine' => 909,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSimilarJson' => 
      array (
        'name' => 'assertSimilarJson',
        'parameters' => 
        array (
          'data' => 
          array (
            'name' => 'data',
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
            'startLine' => 917,
            'endLine' => 917,
            'startColumn' => 39,
            'endColumn' => 49,
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
 * Assert that the response has the similar JSON as given.
 *
 * @param  array  $data
 * @return $this
 */',
        'startLine' => 917,
        'endLine' => 922,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonFragments' => 
      array (
        'name' => 'assertJsonFragments',
        'parameters' => 
        array (
          'data' => 
          array (
            'name' => 'data',
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
            'startLine' => 930,
            'endLine' => 930,
            'startColumn' => 41,
            'endColumn' => 51,
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
 * Assert that the response contains the given JSON fragments.
 *
 * @param  array  $data
 * @return $this
 */',
        'startLine' => 930,
        'endLine' => 937,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonFragment' => 
      array (
        'name' => 'assertJsonFragment',
        'parameters' => 
        array (
          'data' => 
          array (
            'name' => 'data',
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
            'startLine' => 945,
            'endLine' => 945,
            'startColumn' => 40,
            'endColumn' => 50,
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
 * Assert that the response contains the given JSON fragment.
 *
 * @param  array  $data
 * @return $this
 */',
        'startLine' => 945,
        'endLine' => 950,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonMissing' => 
      array (
        'name' => 'assertJsonMissing',
        'parameters' => 
        array (
          'data' => 
          array (
            'name' => 'data',
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
            'startLine' => 959,
            'endLine' => 959,
            'startColumn' => 39,
            'endColumn' => 49,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'exact' => 
          array (
            'name' => 'exact',
            'default' => 
            array (
              'code' => 'false',
              'attributes' => 
              array (
                'startLine' => 959,
                'endLine' => 959,
                'startTokenPos' => 3965,
                'startFilePos' => 26831,
                'endTokenPos' => 3965,
                'endFilePos' => 26835,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 959,
            'endLine' => 959,
            'startColumn' => 52,
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
 * Assert that the response does not contain the given JSON fragment.
 *
 * @param  array  $data
 * @param  bool  $exact
 * @return $this
 */',
        'startLine' => 959,
        'endLine' => 964,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonMissingExact' => 
      array (
        'name' => 'assertJsonMissingExact',
        'parameters' => 
        array (
          'data' => 
          array (
            'name' => 'data',
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
            'startLine' => 972,
            'endLine' => 972,
            'startColumn' => 44,
            'endColumn' => 54,
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
 * Assert that the response does not contain the exact JSON fragment.
 *
 * @param  array  $data
 * @return $this
 */',
        'startLine' => 972,
        'endLine' => 977,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonMissingPath' => 
      array (
        'name' => 'assertJsonMissingPath',
        'parameters' => 
        array (
          'path' => 
          array (
            'name' => 'path',
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
            'startLine' => 985,
            'endLine' => 985,
            'startColumn' => 43,
            'endColumn' => 54,
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
 * Assert that the response does not contain the given path.
 *
 * @param  string  $path
 * @return $this
 */',
        'startLine' => 985,
        'endLine' => 990,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonStructure' => 
      array (
        'name' => 'assertJsonStructure',
        'parameters' => 
        array (
          'structure' => 
          array (
            'name' => 'structure',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 999,
                'endLine' => 999,
                'startTokenPos' => 4075,
                'startFilePos' => 27779,
                'endTokenPos' => 4075,
                'endFilePos' => 27782,
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
            'startLine' => 999,
            'endLine' => 999,
            'startColumn' => 41,
            'endColumn' => 64,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'responseData' => 
          array (
            'name' => 'responseData',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 999,
                'endLine' => 999,
                'startTokenPos' => 4085,
                'startFilePos' => 27808,
                'endTokenPos' => 4085,
                'endFilePos' => 27811,
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
            'startLine' => 999,
            'endLine' => 999,
            'startColumn' => 67,
            'endColumn' => 93,
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
 * Assert that the response has a given JSON structure.
 *
 * @param  array|null  $structure
 * @param  array|null  $responseData
 * @return $this
 */',
        'startLine' => 999,
        'endLine' => 1004,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertExactJsonStructure' => 
      array (
        'name' => 'assertExactJsonStructure',
        'parameters' => 
        array (
          'structure' => 
          array (
            'name' => 'structure',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1013,
                'endLine' => 1013,
                'startTokenPos' => 4127,
                'startFilePos' => 28181,
                'endTokenPos' => 4127,
                'endFilePos' => 28184,
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
            'startLine' => 1013,
            'endLine' => 1013,
            'startColumn' => 46,
            'endColumn' => 69,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'responseData' => 
          array (
            'name' => 'responseData',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1013,
                'endLine' => 1013,
                'startTokenPos' => 4137,
                'startFilePos' => 28210,
                'endTokenPos' => 4137,
                'endFilePos' => 28213,
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
            'startLine' => 1013,
            'endLine' => 1013,
            'startColumn' => 72,
            'endColumn' => 98,
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
 * Assert that the response has the exact JSON structure.
 *
 * @param  array|null  $structure
 * @param  array|null  $responseData
 * @return $this
 */',
        'startLine' => 1013,
        'endLine' => 1018,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonCount' => 
      array (
        'name' => 'assertJsonCount',
        'parameters' => 
        array (
          'count' => 
          array (
            'name' => 'count',
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
            'startLine' => 1027,
            'endLine' => 1027,
            'startColumn' => 37,
            'endColumn' => 46,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'key' => 
          array (
            'name' => 'key',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1027,
                'endLine' => 1027,
                'startTokenPos' => 4184,
                'startFilePos' => 28585,
                'endTokenPos' => 4184,
                'endFilePos' => 28588,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1027,
            'endLine' => 1027,
            'startColumn' => 49,
            'endColumn' => 59,
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
 * Assert that the response JSON has the expected count of items at the given key.
 *
 * @param  int  $count
 * @param  string|null  $key
 * @return $this
 */',
        'startLine' => 1027,
        'endLine' => 1032,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonValidationErrors' => 
      array (
        'name' => 'assertJsonValidationErrors',
        'parameters' => 
        array (
          'errors' => 
          array (
            'name' => 'errors',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1041,
            'endLine' => 1041,
            'startColumn' => 48,
            'endColumn' => 54,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'responseKey' => 
          array (
            'name' => 'responseKey',
            'default' => 
            array (
              'code' => '\'errors\'',
              'attributes' => 
              array (
                'startLine' => 1041,
                'endLine' => 1041,
                'startTokenPos' => 4226,
                'startFilePos' => 28949,
                'endTokenPos' => 4226,
                'endFilePos' => 28956,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1041,
            'endLine' => 1041,
            'startColumn' => 57,
            'endColumn' => 79,
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
 * Assert that the response has the given JSON validation errors.
 *
 * @param  string|array  $errors
 * @param  string  $responseKey
 * @return $this
 */',
        'startLine' => 1041,
        'endLine' => 1083,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertOnlyJsonValidationErrors' => 
      array (
        'name' => 'assertOnlyJsonValidationErrors',
        'parameters' => 
        array (
          'errors' => 
          array (
            'name' => 'errors',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1092,
            'endLine' => 1092,
            'startColumn' => 52,
            'endColumn' => 58,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'responseKey' => 
          array (
            'name' => 'responseKey',
            'default' => 
            array (
              'code' => '\'errors\'',
              'attributes' => 
              array (
                'startLine' => 1092,
                'endLine' => 1092,
                'startTokenPos' => 4512,
                'startFilePos' => 30781,
                'endTokenPos' => 4512,
                'endFilePos' => 30788,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1092,
            'endLine' => 1092,
            'startColumn' => 61,
            'endColumn' => 83,
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
 * Assert that the response has the given JSON validation errors but does not have any other JSON validation errors.
 *
 * @param  string|array  $errors
 * @param  string  $responseKey
 * @return $this
 */',
        'startLine' => 1092,
        'endLine' => 1110,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonValidationErrorFor' => 
      array (
        'name' => 'assertJsonValidationErrorFor',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1119,
            'endLine' => 1119,
            'startColumn' => 50,
            'endColumn' => 53,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'responseKey' => 
          array (
            'name' => 'responseKey',
            'default' => 
            array (
              'code' => '\'errors\'',
              'attributes' => 
              array (
                'startLine' => 1119,
                'endLine' => 1119,
                'startTokenPos' => 4698,
                'startFilePos' => 31696,
                'endTokenPos' => 4698,
                'endFilePos' => 31703,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1119,
            'endLine' => 1119,
            'startColumn' => 56,
            'endColumn' => 78,
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
 * Assert the response has any JSON validation errors for the given key.
 *
 * @param  string  $key
 * @param  string  $responseKey
 * @return $this
 */',
        'startLine' => 1119,
        'endLine' => 1135,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonMissingValidationErrors' => 
      array (
        'name' => 'assertJsonMissingValidationErrors',
        'parameters' => 
        array (
          'keys' => 
          array (
            'name' => 'keys',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1144,
                'endLine' => 1144,
                'startTokenPos' => 4817,
                'startFilePos' => 32596,
                'endTokenPos' => 4817,
                'endFilePos' => 32599,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1144,
            'endLine' => 1144,
            'startColumn' => 55,
            'endColumn' => 66,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'responseKey' => 
          array (
            'name' => 'responseKey',
            'default' => 
            array (
              'code' => '\'errors\'',
              'attributes' => 
              array (
                'startLine' => 1144,
                'endLine' => 1144,
                'startTokenPos' => 4824,
                'startFilePos' => 32617,
                'endTokenPos' => 4824,
                'endFilePos' => 32624,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1144,
            'endLine' => 1144,
            'startColumn' => 69,
            'endColumn' => 91,
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
 * Assert that the response has no JSON validation errors for the given keys.
 *
 * @param  string|array|null  $keys
 * @param  string  $responseKey
 * @return $this
 */',
        'startLine' => 1144,
        'endLine' => 1177,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonIsArray' => 
      array (
        'name' => 'assertJsonIsArray',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1185,
                'endLine' => 1185,
                'startTokenPos' => 5061,
                'startFilePos' => 33750,
                'endTokenPos' => 5061,
                'endFilePos' => 33753,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1185,
            'endLine' => 1185,
            'startColumn' => 39,
            'endColumn' => 49,
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
 * Assert that the given key is a JSON array.
 *
 * @param  string|null  $key
 * @return $this
 */',
        'startLine' => 1185,
        'endLine' => 1198,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertJsonIsObject' => 
      array (
        'name' => 'assertJsonIsObject',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1206,
                'endLine' => 1206,
                'startTokenPos' => 5145,
                'startFilePos' => 34233,
                'endTokenPos' => 5145,
                'endFilePos' => 34236,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1206,
            'endLine' => 1206,
            'startColumn' => 40,
            'endColumn' => 50,
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
 * Assert that the given key is a JSON object.
 *
 * @param  string|null  $key
 * @return $this
 */',
        'startLine' => 1206,
        'endLine' => 1219,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'decodeResponseJson' => 
      array (
        'name' => 'decodeResponseJson',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Validate the decoded response JSON.
 *
 * @return \\Illuminate\\Testing\\AssertableJsonString
 *
 * @throws \\Throwable
 */',
        'startLine' => 1228,
        'endLine' => 1248,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'json' => 
      array (
        'name' => 'json',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1256,
                'endLine' => 1256,
                'startTokenPos' => 5382,
                'startFilePos' => 35569,
                'endTokenPos' => 5382,
                'endFilePos' => 35572,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1256,
            'endLine' => 1256,
            'startColumn' => 26,
            'endColumn' => 36,
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
 * Return the decoded response JSON.
 *
 * @param  string|null  $key
 * @return mixed
 */',
        'startLine' => 1256,
        'endLine' => 1259,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'collect' => 
      array (
        'name' => 'collect',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1267,
                'endLine' => 1267,
                'startTokenPos' => 5415,
                'startFilePos' => 35847,
                'endTokenPos' => 5415,
                'endFilePos' => 35850,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1267,
            'endLine' => 1267,
            'startColumn' => 29,
            'endColumn' => 39,
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
 * Get the JSON decoded body of the response as a collection.
 *
 * @param  string|null  $key
 * @return \\Illuminate\\Support\\Collection
 */',
        'startLine' => 1267,
        'endLine' => 1270,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertViewIs' => 
      array (
        'name' => 'assertViewIs',
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
            'startLine' => 1278,
            'endLine' => 1278,
            'startColumn' => 34,
            'endColumn' => 39,
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
 * Assert that the response view equals the given value.
 *
 * @param  string  $value
 * @return $this
 */',
        'startLine' => 1278,
        'endLine' => 1285,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertViewHas' => 
      array (
        'name' => 'assertViewHas',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1294,
            'endLine' => 1294,
            'startColumn' => 35,
            'endColumn' => 38,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'value' => 
          array (
            'name' => 'value',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1294,
                'endLine' => 1294,
                'startTokenPos' => 5501,
                'startFilePos' => 36480,
                'endTokenPos' => 5501,
                'endFilePos' => 36483,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1294,
            'endLine' => 1294,
            'startColumn' => 41,
            'endColumn' => 53,
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
 * Assert that the response view has a given piece of bound data.
 *
 * @param  string|array  $key
 * @param  mixed  $value
 * @return $this
 */',
        'startLine' => 1294,
        'endLine' => 1320,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertViewHasAll' => 
      array (
        'name' => 'assertViewHasAll',
        'parameters' => 
        array (
          'bindings' => 
          array (
            'name' => 'bindings',
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
            'startLine' => 1328,
            'endLine' => 1328,
            'startColumn' => 38,
            'endColumn' => 52,
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
 * Assert that the response view has a given list of bound data.
 *
 * @param  array  $bindings
 * @return $this
 */',
        'startLine' => 1328,
        'endLine' => 1339,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'viewData' => 
      array (
        'name' => 'viewData',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1347,
            'endLine' => 1347,
            'startColumn' => 30,
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
 * Get a piece of data from the original view.
 *
 * @param  string  $key
 * @return mixed
 */',
        'startLine' => 1347,
        'endLine' => 1352,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertViewMissing' => 
      array (
        'name' => 'assertViewMissing',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1360,
            'endLine' => 1360,
            'startColumn' => 39,
            'endColumn' => 42,
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
 * Assert that the response view is missing a piece of bound data.
 *
 * @param  string  $key
 * @return $this
 */',
        'startLine' => 1360,
        'endLine' => 1367,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'ensureResponseHasView' => 
      array (
        'name' => 'ensureResponseHasView',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Ensure that the response has a view as its original content.
 *
 * @return $this
 */',
        'startLine' => 1374,
        'endLine' => 1381,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'responseHasView' => 
      array (
        'name' => 'responseHasView',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Determine if the original response is a view.
 *
 * @return bool
 */',
        'startLine' => 1388,
        'endLine' => 1391,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertValid' => 
      array (
        'name' => 'assertValid',
        'parameters' => 
        array (
          'keys' => 
          array (
            'name' => 'keys',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1401,
                'endLine' => 1401,
                'startTokenPos' => 6088,
                'startFilePos' => 39828,
                'endTokenPos' => 6088,
                'endFilePos' => 39831,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1401,
            'endLine' => 1401,
            'startColumn' => 33,
            'endColumn' => 44,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'errorBag' => 
          array (
            'name' => 'errorBag',
            'default' => 
            array (
              'code' => '\'default\'',
              'attributes' => 
              array (
                'startLine' => 1401,
                'endLine' => 1401,
                'startTokenPos' => 6095,
                'startFilePos' => 39846,
                'endTokenPos' => 6095,
                'endFilePos' => 39854,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1401,
            'endLine' => 1401,
            'startColumn' => 47,
            'endColumn' => 67,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'responseKey' => 
          array (
            'name' => 'responseKey',
            'default' => 
            array (
              'code' => '\'errors\'',
              'attributes' => 
              array (
                'startLine' => 1401,
                'endLine' => 1401,
                'startTokenPos' => 6102,
                'startFilePos' => 39872,
                'endTokenPos' => 6102,
                'endFilePos' => 39879,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1401,
            'endLine' => 1401,
            'startColumn' => 70,
            'endColumn' => 92,
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
 * Assert that the given keys do not have validation errors.
 *
 * @param  string|array|null  $keys
 * @param  string  $errorBag
 * @param  string  $responseKey
 * @return $this
 */',
        'startLine' => 1401,
        'endLine' => 1434,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertInvalid' => 
      array (
        'name' => 'assertInvalid',
        'parameters' => 
        array (
          'errors' => 
          array (
            'name' => 'errors',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1444,
                'endLine' => 1444,
                'startTokenPos' => 6360,
                'startFilePos' => 41225,
                'endTokenPos' => 6360,
                'endFilePos' => 41228,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1444,
            'endLine' => 1444,
            'startColumn' => 35,
            'endColumn' => 48,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'errorBag' => 
          array (
            'name' => 'errorBag',
            'default' => 
            array (
              'code' => '\'default\'',
              'attributes' => 
              array (
                'startLine' => 1445,
                'endLine' => 1445,
                'startTokenPos' => 6367,
                'startFilePos' => 41277,
                'endTokenPos' => 6367,
                'endFilePos' => 41285,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1445,
            'endLine' => 1445,
            'startColumn' => 35,
            'endColumn' => 55,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'responseKey' => 
          array (
            'name' => 'responseKey',
            'default' => 
            array (
              'code' => '\'errors\'',
              'attributes' => 
              array (
                'startLine' => 1446,
                'endLine' => 1446,
                'startTokenPos' => 6374,
                'startFilePos' => 41337,
                'endTokenPos' => 6374,
                'endFilePos' => 41344,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1446,
            'endLine' => 1446,
            'startColumn' => 35,
            'endColumn' => 57,
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
 * Assert that the response has the given validation errors.
 *
 * @param  string|array|null  $errors
 * @param  string  $errorBag
 * @param  string  $responseKey
 * @return $this
 */',
        'startLine' => 1444,
        'endLine' => 1490,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertOnlyInvalid' => 
      array (
        'name' => 'assertOnlyInvalid',
        'parameters' => 
        array (
          'errors' => 
          array (
            'name' => 'errors',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1500,
                'endLine' => 1500,
                'startTokenPos' => 6708,
                'startFilePos' => 43445,
                'endTokenPos' => 6708,
                'endFilePos' => 43448,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1500,
            'endLine' => 1500,
            'startColumn' => 39,
            'endColumn' => 52,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'errorBag' => 
          array (
            'name' => 'errorBag',
            'default' => 
            array (
              'code' => '\'default\'',
              'attributes' => 
              array (
                'startLine' => 1500,
                'endLine' => 1500,
                'startTokenPos' => 6715,
                'startFilePos' => 43463,
                'endTokenPos' => 6715,
                'endFilePos' => 43471,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1500,
            'endLine' => 1500,
            'startColumn' => 55,
            'endColumn' => 75,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'responseKey' => 
          array (
            'name' => 'responseKey',
            'default' => 
            array (
              'code' => '\'errors\'',
              'attributes' => 
              array (
                'startLine' => 1500,
                'endLine' => 1500,
                'startTokenPos' => 6722,
                'startFilePos' => 43489,
                'endTokenPos' => 6722,
                'endFilePos' => 43496,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1500,
            'endLine' => 1500,
            'startColumn' => 78,
            'endColumn' => 100,
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
 * Assert that the response has the given validation errors but does not have any other validation errors.
 *
 * @param  string|array|null  $errors
 * @param  string  $errorBag
 * @param  string  $responseKey
 * @return $this
 */',
        'startLine' => 1500,
        'endLine' => 1524,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSessionHas' => 
      array (
        'name' => 'assertSessionHas',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1533,
            'endLine' => 1533,
            'startColumn' => 38,
            'endColumn' => 41,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'value' => 
          array (
            'name' => 'value',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1533,
                'endLine' => 1533,
                'startTokenPos' => 6944,
                'startFilePos' => 44569,
                'endTokenPos' => 6944,
                'endFilePos' => 44572,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1533,
            'endLine' => 1533,
            'startColumn' => 44,
            'endColumn' => 56,
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
 * Assert that the session has a given value.
 *
 * @param  string|array  $key
 * @param  mixed  $value
 * @return $this
 */',
        'startLine' => 1533,
        'endLine' => 1551,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSessionHasAll' => 
      array (
        'name' => 'assertSessionHasAll',
        'parameters' => 
        array (
          'bindings' => 
          array (
            'name' => 'bindings',
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
            'startLine' => 1559,
            'endLine' => 1559,
            'startColumn' => 41,
            'endColumn' => 55,
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
 * Assert that the session has a given list of values.
 *
 * @param  array  $bindings
 * @return $this
 */',
        'startLine' => 1559,
        'endLine' => 1570,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSessionHasInput' => 
      array (
        'name' => 'assertSessionHasInput',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1579,
            'endLine' => 1579,
            'startColumn' => 43,
            'endColumn' => 46,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'value' => 
          array (
            'name' => 'value',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1579,
                'endLine' => 1579,
                'startTokenPos' => 7188,
                'startFilePos' => 45866,
                'endTokenPos' => 7188,
                'endFilePos' => 45869,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1579,
            'endLine' => 1579,
            'startColumn' => 49,
            'endColumn' => 61,
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
 * Assert that the session has a given value in the flashed input array.
 *
 * @param  string|array  $key
 * @param  mixed  $value
 * @return $this
 */',
        'startLine' => 1579,
        'endLine' => 1605,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSessionHasErrors' => 
      array (
        'name' => 'assertSessionHasErrors',
        'parameters' => 
        array (
          'keys' => 
          array (
            'name' => 'keys',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 1615,
                'endLine' => 1615,
                'startTokenPos' => 7402,
                'startFilePos' => 46953,
                'endTokenPos' => 7403,
                'endFilePos' => 46954,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1615,
            'endLine' => 1615,
            'startColumn' => 44,
            'endColumn' => 53,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'format' => 
          array (
            'name' => 'format',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1615,
                'endLine' => 1615,
                'startTokenPos' => 7410,
                'startFilePos' => 46967,
                'endTokenPos' => 7410,
                'endFilePos' => 46970,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1615,
            'endLine' => 1615,
            'startColumn' => 56,
            'endColumn' => 69,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'errorBag' => 
          array (
            'name' => 'errorBag',
            'default' => 
            array (
              'code' => '\'default\'',
              'attributes' => 
              array (
                'startLine' => 1615,
                'endLine' => 1615,
                'startTokenPos' => 7417,
                'startFilePos' => 46985,
                'endTokenPos' => 7417,
                'endFilePos' => 46993,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1615,
            'endLine' => 1615,
            'startColumn' => 72,
            'endColumn' => 92,
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
 * Assert that the session has the given errors.
 *
 * @param  string|array  $keys
 * @param  mixed  $format
 * @param  string  $errorBag
 * @return $this
 */',
        'startLine' => 1615,
        'endLine' => 1632,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSessionDoesntHaveErrors' => 
      array (
        'name' => 'assertSessionDoesntHaveErrors',
        'parameters' => 
        array (
          'keys' => 
          array (
            'name' => 'keys',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 1642,
                'endLine' => 1642,
                'startTokenPos' => 7577,
                'startFilePos' => 47814,
                'endTokenPos' => 7578,
                'endFilePos' => 47815,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1642,
            'endLine' => 1642,
            'startColumn' => 51,
            'endColumn' => 60,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'format' => 
          array (
            'name' => 'format',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1642,
                'endLine' => 1642,
                'startTokenPos' => 7585,
                'startFilePos' => 47828,
                'endTokenPos' => 7585,
                'endFilePos' => 47831,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1642,
            'endLine' => 1642,
            'startColumn' => 63,
            'endColumn' => 76,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'errorBag' => 
          array (
            'name' => 'errorBag',
            'default' => 
            array (
              'code' => '\'default\'',
              'attributes' => 
              array (
                'startLine' => 1642,
                'endLine' => 1642,
                'startTokenPos' => 7592,
                'startFilePos' => 47846,
                'endTokenPos' => 7592,
                'endFilePos' => 47854,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1642,
            'endLine' => 1642,
            'startColumn' => 79,
            'endColumn' => 99,
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
 * Assert that the session is missing the given errors.
 *
 * @param  string|array  $keys
 * @param  string|null  $format
 * @param  string  $errorBag
 * @return $this
 */',
        'startLine' => 1642,
        'endLine' => 1667,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSessionHasNoErrors' => 
      array (
        'name' => 'assertSessionHasNoErrors',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Assert that the session has no errors.
 *
 * @return $this
 */',
        'startLine' => 1674,
        'endLine' => 1699,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSessionHasErrorsIn' => 
      array (
        'name' => 'assertSessionHasErrorsIn',
        'parameters' => 
        array (
          'errorBag' => 
          array (
            'name' => 'errorBag',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1709,
            'endLine' => 1709,
            'startColumn' => 46,
            'endColumn' => 54,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'keys' => 
          array (
            'name' => 'keys',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 1709,
                'endLine' => 1709,
                'startTokenPos' => 7997,
                'startFilePos' => 49872,
                'endTokenPos' => 7998,
                'endFilePos' => 49873,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1709,
            'endLine' => 1709,
            'startColumn' => 57,
            'endColumn' => 66,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'format' => 
          array (
            'name' => 'format',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1709,
                'endLine' => 1709,
                'startTokenPos' => 8005,
                'startFilePos' => 49886,
                'endTokenPos' => 8005,
                'endFilePos' => 49889,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1709,
            'endLine' => 1709,
            'startColumn' => 69,
            'endColumn' => 82,
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
 * Assert that the session has the given errors.
 *
 * @param  string  $errorBag
 * @param  string|array  $keys
 * @param  mixed  $format
 * @return $this
 */',
        'startLine' => 1709,
        'endLine' => 1712,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'assertSessionMissing' => 
      array (
        'name' => 'assertSessionMissing',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1721,
            'endLine' => 1721,
            'startColumn' => 42,
            'endColumn' => 45,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'value' => 
          array (
            'name' => 'value',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1721,
                'endLine' => 1721,
                'startTokenPos' => 8043,
                'startFilePos' => 50199,
                'endTokenPos' => 8043,
                'endFilePos' => 50202,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1721,
            'endLine' => 1721,
            'startColumn' => 48,
            'endColumn' => 60,
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
 * Assert that the session does not have a given key.
 *
 * @param  string|array  $key
 * @param  mixed  $value
 * @return $this
 */',
        'startLine' => 1721,
        'endLine' => 1743,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'session' => 
      array (
        'name' => 'session',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the current session store.
 *
 * @return \\Illuminate\\Session\\Store
 */',
        'startLine' => 1750,
        'endLine' => 1759,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'ddHeaders' => 
      array (
        'name' => 'ddHeaders',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Dump the headers from the response and end the script.
 *
 * @return never
 */',
        'startLine' => 1766,
        'endLine' => 1771,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'ddBody' => 
      array (
        'name' => 'ddBody',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1779,
                'endLine' => 1779,
                'startTokenPos' => 8302,
                'startFilePos' => 51541,
                'endTokenPos' => 8302,
                'endFilePos' => 51544,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1779,
            'endLine' => 1779,
            'startColumn' => 28,
            'endColumn' => 38,
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
 * Dump the body of the response and end the script.
 *
 * @param  string|null  $key
 * @return never
 */',
        'startLine' => 1779,
        'endLine' => 1788,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'ddJson' => 
      array (
        'name' => 'ddJson',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1796,
                'endLine' => 1796,
                'startTokenPos' => 8359,
                'startFilePos' => 51881,
                'endTokenPos' => 8359,
                'endFilePos' => 51884,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1796,
            'endLine' => 1796,
            'startColumn' => 28,
            'endColumn' => 38,
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
 * Dump the JSON payload from the response and end the script.
 *
 * @param  string|null  $key
 * @return never
 */',
        'startLine' => 1796,
        'endLine' => 1799,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'ddSession' => 
      array (
        'name' => 'ddSession',
        'parameters' => 
        array (
          'keys' => 
          array (
            'name' => 'keys',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 1807,
                'endLine' => 1807,
                'startTokenPos' => 8389,
                'startFilePos' => 52110,
                'endTokenPos' => 8390,
                'endFilePos' => 52111,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1807,
            'endLine' => 1807,
            'startColumn' => 31,
            'endColumn' => 40,
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
 * Dump the session from the response and end the script.
 *
 * @param  string|array  $keys
 * @return never
 */',
        'startLine' => 1807,
        'endLine' => 1812,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'dump' => 
      array (
        'name' => 'dump',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => 
            array (
              'code' => 'null',
              'attributes' => 
              array (
                'startLine' => 1820,
                'endLine' => 1820,
                'startTokenPos' => 8423,
                'startFilePos' => 52332,
                'endTokenPos' => 8423,
                'endFilePos' => 52335,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1820,
            'endLine' => 1820,
            'startColumn' => 26,
            'endColumn' => 36,
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
 * Dump the content from the response.
 *
 * @param  string|null  $key
 * @return $this
 */',
        'startLine' => 1820,
        'endLine' => 1837,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'dumpHeaders' => 
      array (
        'name' => 'dumpHeaders',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Dump the headers from the response.
 *
 * @return $this
 */',
        'startLine' => 1844,
        'endLine' => 1849,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'dumpSession' => 
      array (
        'name' => 'dumpSession',
        'parameters' => 
        array (
          'keys' => 
          array (
            'name' => 'keys',
            'default' => 
            array (
              'code' => '[]',
              'attributes' => 
              array (
                'startLine' => 1857,
                'endLine' => 1857,
                'startTokenPos' => 8561,
                'startFilePos' => 53035,
                'endTokenPos' => 8562,
                'endFilePos' => 53036,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1857,
            'endLine' => 1857,
            'startColumn' => 33,
            'endColumn' => 42,
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
 * Dump the session from the response.
 *
 * @param  string|array  $keys
 * @return $this
 */',
        'startLine' => 1857,
        'endLine' => 1868,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'streamedContent' => 
      array (
        'name' => 'streamedContent',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the streamed content from the response.
 *
 * @return string
 */',
        'startLine' => 1875,
        'endLine' => 1897,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'withExceptions' => 
      array (
        'name' => 'withExceptions',
        'parameters' => 
        array (
          'exceptions' => 
          array (
            'name' => 'exceptions',
            'default' => NULL,
            'type' => 
            array (
              'class' => 'PHPStan\\BetterReflection\\Reflection\\ReflectionNamedType',
              'data' => 
              array (
                'name' => 'Illuminate\\Support\\Collection',
                'isIdentifier' => false,
              ),
            ),
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1905,
            'endLine' => 1905,
            'startColumn' => 36,
            'endColumn' => 57,
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
 * Set the previous exceptions on the response.
 *
 * @param  \\Illuminate\\Support\\Collection  $exceptions
 * @return $this
 */',
        'startLine' => 1905,
        'endLine' => 1910,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      '__get' => 
      array (
        'name' => '__get',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1918,
            'endLine' => 1918,
            'startColumn' => 27,
            'endColumn' => 30,
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
 * Dynamically access base response parameters.
 *
 * @param  string  $key
 * @return mixed
 */',
        'startLine' => 1918,
        'endLine' => 1921,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      '__isset' => 
      array (
        'name' => '__isset',
        'parameters' => 
        array (
          'key' => 
          array (
            'name' => 'key',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1929,
            'endLine' => 1929,
            'startColumn' => 29,
            'endColumn' => 32,
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
 * Proxy isset() checks to the underlying base response.
 *
 * @param  string  $key
 * @return bool
 */',
        'startLine' => 1929,
        'endLine' => 1932,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'offsetExists' => 
      array (
        'name' => 'offsetExists',
        'parameters' => 
        array (
          'offset' => 
          array (
            'name' => 'offset',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1940,
            'endLine' => 1940,
            'startColumn' => 34,
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
            'name' => 'bool',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Determine if the given offset exists.
 *
 * @param  string  $offset
 * @return bool
 */',
        'startLine' => 1940,
        'endLine' => 1945,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'offsetGet' => 
      array (
        'name' => 'offsetGet',
        'parameters' => 
        array (
          'offset' => 
          array (
            'name' => 'offset',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1953,
            'endLine' => 1953,
            'startColumn' => 31,
            'endColumn' => 37,
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
            'name' => 'mixed',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Get the value for a given offset.
 *
 * @param  string  $offset
 * @return mixed
 */',
        'startLine' => 1953,
        'endLine' => 1958,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'offsetSet' => 
      array (
        'name' => 'offsetSet',
        'parameters' => 
        array (
          'offset' => 
          array (
            'name' => 'offset',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1969,
            'endLine' => 1969,
            'startColumn' => 31,
            'endColumn' => 37,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
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
            'startLine' => 1969,
            'endLine' => 1969,
            'startColumn' => 40,
            'endColumn' => 45,
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
            'name' => 'void',
            'isIdentifier' => true,
          ),
        ),
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Set the value at the given offset.
 *
 * @param  string  $offset
 * @param  mixed  $value
 * @return void
 *
 * @throws \\LogicException
 */',
        'startLine' => 1969,
        'endLine' => 1972,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      'offsetUnset' => 
      array (
        'name' => 'offsetUnset',
        'parameters' => 
        array (
          'offset' => 
          array (
            'name' => 'offset',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1982,
            'endLine' => 1982,
            'startColumn' => 33,
            'endColumn' => 39,
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
 * Unset the value at the given offset.
 *
 * @param  string  $offset
 * @return void
 *
 * @throws \\LogicException
 */',
        'startLine' => 1982,
        'endLine' => 1985,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
      '__call' => 
      array (
        'name' => '__call',
        'parameters' => 
        array (
          'method' => 
          array (
            'name' => 'method',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1994,
            'endLine' => 1994,
            'startColumn' => 28,
            'endColumn' => 34,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'args' => 
          array (
            'name' => 'args',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 1994,
            'endLine' => 1994,
            'startColumn' => 37,
            'endColumn' => 41,
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
 * Handle dynamic calls into macros or pass missing methods to the base response.
 *
 * @param  string  $method
 * @param  array  $args
 * @return mixed
 */',
        'startLine' => 1994,
        'endLine' => 2001,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Testing',
        'declaringClassName' => 'Illuminate\\Testing\\TestResponse',
        'implementingClassName' => 'Illuminate\\Testing\\TestResponse',
        'currentClassName' => 'Illuminate\\Testing\\TestResponse',
        'aliasName' => NULL,
      ),
    ),
    'traitsData' => 
    array (
      'aliases' => 
      array (
        'Illuminate\\Testing\\Concerns\\AssertsStatusCodes' => 
        array (
          0 => 
          array (
            'alias' => 'macroCall',
            'method' => '__call',
            'hash' => 'illuminate\\testing\\concerns\\assertsstatuscodes::__call',
          ),
        ),
        'Illuminate\\Support\\Traits\\Conditionable' => 
        array (
          0 => 
          array (
            'alias' => 'macroCall',
            'method' => '__call',
            'hash' => 'illuminate\\support\\traits\\conditionable::__call',
          ),
        ),
        'Illuminate\\Support\\Traits\\Dumpable' => 
        array (
          0 => 
          array (
            'alias' => 'macroCall',
            'method' => '__call',
            'hash' => 'illuminate\\support\\traits\\dumpable::__call',
          ),
        ),
        'Illuminate\\Support\\Traits\\Tappable' => 
        array (
          0 => 
          array (
            'alias' => 'macroCall',
            'method' => '__call',
            'hash' => 'illuminate\\support\\traits\\tappable::__call',
          ),
        ),
        'Illuminate\\Support\\Traits\\Macroable' => 
        array (
          0 => 
          array (
            'alias' => 'macroCall',
            'method' => '__call',
            'hash' => 'illuminate\\support\\traits\\macroable::__call',
          ),
        ),
      ),
      'modifiers' => 
      array (
      ),
      'precedences' => 
      array (
      ),
      'hashes' => 
      array (
        'illuminate\\testing\\concerns\\assertsstatuscodes::__call' => 'Illuminate\\Testing\\Concerns\\AssertsStatusCodes::__call',
        'illuminate\\support\\traits\\conditionable::__call' => 'Illuminate\\Support\\Traits\\Conditionable::__call',
        'illuminate\\support\\traits\\dumpable::__call' => 'Illuminate\\Support\\Traits\\Dumpable::__call',
        'illuminate\\support\\traits\\tappable::__call' => 'Illuminate\\Support\\Traits\\Tappable::__call',
        'illuminate\\support\\traits\\macroable::__call' => 'Illuminate\\Support\\Traits\\Macroable::__call',
      ),
    ),
  ),
));