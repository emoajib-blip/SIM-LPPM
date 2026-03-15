<?php declare(strict_types = 1);

// odsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../laravel/framework/src/Illuminate/Support/helpers.php-PHPStan\BetterReflection\Reflection\ReflectionFunction-throw_if
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-6.65.0.9-8.4.1-29447347198c1ea5939b1c969459d8620c2827cf7db9230fbb00a059816cc97f',
   'data' => 
  array (
    'name' => 'throw_if',
    'parameters' => 
    array (
      'condition' => 
      array (
        'name' => 'condition',
        'default' => NULL,
        'type' => NULL,
        'isVariadic' => false,
        'byRef' => false,
        'isPromoted' => false,
        'attributes' => 
        array (
        ),
        'startLine' => 412,
        'endLine' => 412,
        'startColumn' => 23,
        'endColumn' => 32,
        'parameterIndex' => 0,
        'isOptional' => false,
      ),
      'exception' => 
      array (
        'name' => 'exception',
        'default' => 
        array (
          'code' => '\'RuntimeException\'',
          'attributes' => 
          array (
            'startLine' => 412,
            'endLine' => 412,
            'startTokenPos' => 1768,
            'startFilePos' => 10476,
            'endTokenPos' => 1768,
            'endFilePos' => 10493,
          ),
        ),
        'type' => NULL,
        'isVariadic' => false,
        'byRef' => false,
        'isPromoted' => false,
        'attributes' => 
        array (
        ),
        'startLine' => 412,
        'endLine' => 412,
        'startColumn' => 35,
        'endColumn' => 65,
        'parameterIndex' => 1,
        'isOptional' => true,
      ),
      'parameters' => 
      array (
        'name' => 'parameters',
        'default' => NULL,
        'type' => NULL,
        'isVariadic' => true,
        'byRef' => false,
        'isPromoted' => false,
        'attributes' => 
        array (
        ),
        'startLine' => 412,
        'endLine' => 412,
        'startColumn' => 68,
        'endColumn' => 81,
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
 * Throw the given exception if the given condition is true.
 *
 * @template TValue
 * @template TParams of mixed
 * @template TException of \\Throwable
 * @template TExceptionValue of TException|class-string<TException>|string
 *
 * @param  TValue  $condition
 * @param  Closure(TParams): TExceptionValue|TExceptionValue  $exception
 * @param  TParams  ...$parameters
 * @return ($condition is true ? never : ($condition is non-empty-mixed ? never : TValue))
 *
 * @throws TException
 */',
    'startLine' => 412,
    'endLine' => 427,
    'startColumn' => 5,
    'endColumn' => 5,
    'couldThrow' => false,
    'isClosure' => false,
    'isGenerator' => false,
    'isVariadic' => true,
    'isStatic' => false,
    'namespace' => NULL,
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'throw_if',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../laravel/framework/src/Illuminate/Support/helpers.php',
      ),
    ),
  ),
));