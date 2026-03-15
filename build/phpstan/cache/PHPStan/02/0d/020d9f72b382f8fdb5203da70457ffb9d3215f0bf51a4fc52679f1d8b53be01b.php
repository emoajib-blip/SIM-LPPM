<?php declare(strict_types = 1);

// osfsl-/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../laravel/framework/src/Illuminate/Console/Scheduling/ManagesFrequencies.php-PHPStan\BetterReflection\Reflection\ReflectionClass-Illuminate\Console\Scheduling\ManagesFrequencies
return \PHPStan\Cache\CacheItem::__set_state(array(
   'variableKey' => 'v2-16b903ac6cf53c4e165842e79d233b92eba6e67e06390eef5a3742a4cd664904-8.4.1-6.65.0.9',
   'data' => 
  array (
    'locatedSource' => 
    array (
      'class' => 'PHPStan\\BetterReflection\\SourceLocator\\Located\\LocatedSource',
      'data' => 
      array (
        'name' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'filename' => '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/vendor/composer/../laravel/framework/src/Illuminate/Console/Scheduling/ManagesFrequencies.php',
      ),
    ),
    'namespace' => 'Illuminate\\Console\\Scheduling',
    'name' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
    'shortName' => 'ManagesFrequencies',
    'isInterface' => false,
    'isTrait' => true,
    'isEnum' => false,
    'isBackedEnum' => false,
    'modifiers' => 0,
    'docComment' => NULL,
    'attributes' => 
    array (
    ),
    'startLine' => 10,
    'endLine' => 684,
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
      'cron' => 
      array (
        'name' => 'cron',
        'parameters' => 
        array (
          'expression' => 
          array (
            'name' => 'expression',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 18,
            'endLine' => 18,
            'startColumn' => 26,
            'endColumn' => 36,
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
 * The Cron expression representing the event\'s frequency.
 *
 * @param  string  $expression
 * @return $this
 */',
        'startLine' => 18,
        'endLine' => 23,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'between' => 
      array (
        'name' => 'between',
        'parameters' => 
        array (
          'startTime' => 
          array (
            'name' => 'startTime',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 32,
            'endLine' => 32,
            'startColumn' => 29,
            'endColumn' => 38,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'endTime' => 
          array (
            'name' => 'endTime',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 32,
            'endLine' => 32,
            'startColumn' => 41,
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
 * Schedule the event to run between start and end time.
 *
 * @param  string  $startTime
 * @param  string  $endTime
 * @return $this
 */',
        'startLine' => 32,
        'endLine' => 35,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'unlessBetween' => 
      array (
        'name' => 'unlessBetween',
        'parameters' => 
        array (
          'startTime' => 
          array (
            'name' => 'startTime',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 44,
            'endLine' => 44,
            'startColumn' => 35,
            'endColumn' => 44,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'endTime' => 
          array (
            'name' => 'endTime',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 44,
            'endLine' => 44,
            'startColumn' => 47,
            'endColumn' => 54,
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
 * Schedule the event to not run between start and end time.
 *
 * @param  string  $startTime
 * @param  string  $endTime
 * @return $this
 */',
        'startLine' => 44,
        'endLine' => 47,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'inTimeInterval' => 
      array (
        'name' => 'inTimeInterval',
        'parameters' => 
        array (
          'startTime' => 
          array (
            'name' => 'startTime',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 56,
            'endLine' => 56,
            'startColumn' => 37,
            'endColumn' => 46,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'endTime' => 
          array (
            'name' => 'endTime',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 56,
            'endLine' => 56,
            'startColumn' => 49,
            'endColumn' => 56,
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
 * Schedule the event to run between start and end time.
 *
 * @param  string  $startTime
 * @param  string  $endTime
 * @return \\Closure
 */',
        'startLine' => 56,
        'endLine' => 73,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 4,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everySecond' => 
      array (
        'name' => 'everySecond',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every second.
 *
 * @return $this
 */',
        'startLine' => 80,
        'endLine' => 83,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyTwoSeconds' => 
      array (
        'name' => 'everyTwoSeconds',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every two seconds.
 *
 * @return $this
 */',
        'startLine' => 90,
        'endLine' => 93,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyFiveSeconds' => 
      array (
        'name' => 'everyFiveSeconds',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every five seconds.
 *
 * @return $this
 */',
        'startLine' => 100,
        'endLine' => 103,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyTenSeconds' => 
      array (
        'name' => 'everyTenSeconds',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every ten seconds.
 *
 * @return $this
 */',
        'startLine' => 110,
        'endLine' => 113,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyFifteenSeconds' => 
      array (
        'name' => 'everyFifteenSeconds',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every fifteen seconds.
 *
 * @return $this
 */',
        'startLine' => 120,
        'endLine' => 123,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyTwentySeconds' => 
      array (
        'name' => 'everyTwentySeconds',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every twenty seconds.
 *
 * @return $this
 */',
        'startLine' => 130,
        'endLine' => 133,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyThirtySeconds' => 
      array (
        'name' => 'everyThirtySeconds',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every thirty seconds.
 *
 * @return $this
 */',
        'startLine' => 140,
        'endLine' => 143,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'repeatEvery' => 
      array (
        'name' => 'repeatEvery',
        'parameters' => 
        array (
          'seconds' => 
          array (
            'name' => 'seconds',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 151,
            'endLine' => 151,
            'startColumn' => 36,
            'endColumn' => 43,
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
 * Schedule the event to run multiple times per minute.
 *
 * @param  int<0, 59>  $seconds
 * @return $this
 */',
        'startLine' => 151,
        'endLine' => 160,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyMinute' => 
      array (
        'name' => 'everyMinute',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every minute.
 *
 * @return $this
 */',
        'startLine' => 167,
        'endLine' => 170,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyTwoMinutes' => 
      array (
        'name' => 'everyTwoMinutes',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every two minutes.
 *
 * @return $this
 */',
        'startLine' => 177,
        'endLine' => 180,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyThreeMinutes' => 
      array (
        'name' => 'everyThreeMinutes',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every three minutes.
 *
 * @return $this
 */',
        'startLine' => 187,
        'endLine' => 190,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyFourMinutes' => 
      array (
        'name' => 'everyFourMinutes',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every four minutes.
 *
 * @return $this
 */',
        'startLine' => 197,
        'endLine' => 200,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyFiveMinutes' => 
      array (
        'name' => 'everyFiveMinutes',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every five minutes.
 *
 * @return $this
 */',
        'startLine' => 207,
        'endLine' => 210,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyTenMinutes' => 
      array (
        'name' => 'everyTenMinutes',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every ten minutes.
 *
 * @return $this
 */',
        'startLine' => 217,
        'endLine' => 220,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyFifteenMinutes' => 
      array (
        'name' => 'everyFifteenMinutes',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every fifteen minutes.
 *
 * @return $this
 */',
        'startLine' => 227,
        'endLine' => 230,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyThirtyMinutes' => 
      array (
        'name' => 'everyThirtyMinutes',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run every thirty minutes.
 *
 * @return $this
 */',
        'startLine' => 237,
        'endLine' => 240,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'hourly' => 
      array (
        'name' => 'hourly',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run hourly.
 *
 * @return $this
 */',
        'startLine' => 247,
        'endLine' => 250,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'hourlyAt' => 
      array (
        'name' => 'hourlyAt',
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
            'startLine' => 258,
            'endLine' => 258,
            'startColumn' => 30,
            'endColumn' => 36,
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
 * Schedule the event to run hourly at a given offset in the hour.
 *
 * @param  array|string|int<0, 59>|int<0, 59>[]  $offset
 * @return $this
 */',
        'startLine' => 258,
        'endLine' => 261,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyOddHour' => 
      array (
        'name' => 'everyOddHour',
        'parameters' => 
        array (
          'offset' => 
          array (
            'name' => 'offset',
            'default' => 
            array (
              'code' => '0',
              'attributes' => 
              array (
                'startLine' => 269,
                'endLine' => 269,
                'startTokenPos' => 798,
                'startFilePos' => 5797,
                'endTokenPos' => 798,
                'endFilePos' => 5797,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 269,
            'endLine' => 269,
            'startColumn' => 34,
            'endColumn' => 44,
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
 * Schedule the event to run every odd hour.
 *
 * @param  array|string|int  $offset
 * @return $this
 */',
        'startLine' => 269,
        'endLine' => 272,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyTwoHours' => 
      array (
        'name' => 'everyTwoHours',
        'parameters' => 
        array (
          'offset' => 
          array (
            'name' => 'offset',
            'default' => 
            array (
              'code' => '0',
              'attributes' => 
              array (
                'startLine' => 280,
                'endLine' => 280,
                'startTokenPos' => 830,
                'startFilePos' => 6052,
                'endTokenPos' => 830,
                'endFilePos' => 6052,
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
            'startColumn' => 35,
            'endColumn' => 45,
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
 * Schedule the event to run every two hours.
 *
 * @param  array|string|int  $offset
 * @return $this
 */',
        'startLine' => 280,
        'endLine' => 283,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyThreeHours' => 
      array (
        'name' => 'everyThreeHours',
        'parameters' => 
        array (
          'offset' => 
          array (
            'name' => 'offset',
            'default' => 
            array (
              'code' => '0',
              'attributes' => 
              array (
                'startLine' => 291,
                'endLine' => 291,
                'startTokenPos' => 862,
                'startFilePos' => 6308,
                'endTokenPos' => 862,
                'endFilePos' => 6308,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 291,
            'endLine' => 291,
            'startColumn' => 37,
            'endColumn' => 47,
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
 * Schedule the event to run every three hours.
 *
 * @param  array|string|int  $offset
 * @return $this
 */',
        'startLine' => 291,
        'endLine' => 294,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everyFourHours' => 
      array (
        'name' => 'everyFourHours',
        'parameters' => 
        array (
          'offset' => 
          array (
            'name' => 'offset',
            'default' => 
            array (
              'code' => '0',
              'attributes' => 
              array (
                'startLine' => 302,
                'endLine' => 302,
                'startTokenPos' => 894,
                'startFilePos' => 6562,
                'endTokenPos' => 894,
                'endFilePos' => 6562,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 302,
            'endLine' => 302,
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
 * Schedule the event to run every four hours.
 *
 * @param  array|string|int  $offset
 * @return $this
 */',
        'startLine' => 302,
        'endLine' => 305,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'everySixHours' => 
      array (
        'name' => 'everySixHours',
        'parameters' => 
        array (
          'offset' => 
          array (
            'name' => 'offset',
            'default' => 
            array (
              'code' => '0',
              'attributes' => 
              array (
                'startLine' => 313,
                'endLine' => 313,
                'startTokenPos' => 926,
                'startFilePos' => 6814,
                'endTokenPos' => 926,
                'endFilePos' => 6814,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 313,
            'endLine' => 313,
            'startColumn' => 35,
            'endColumn' => 45,
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
 * Schedule the event to run every six hours.
 *
 * @param  array|string|int  $offset
 * @return $this
 */',
        'startLine' => 313,
        'endLine' => 316,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'daily' => 
      array (
        'name' => 'daily',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run daily.
 *
 * @return $this
 */',
        'startLine' => 323,
        'endLine' => 326,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'at' => 
      array (
        'name' => 'at',
        'parameters' => 
        array (
          'time' => 
          array (
            'name' => 'time',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 334,
            'endLine' => 334,
            'startColumn' => 24,
            'endColumn' => 28,
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
 * Schedule the command at a given time.
 *
 * @param  string  $time
 * @return $this
 */',
        'startLine' => 334,
        'endLine' => 337,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'dailyAt' => 
      array (
        'name' => 'dailyAt',
        'parameters' => 
        array (
          'time' => 
          array (
            'name' => 'time',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 345,
            'endLine' => 345,
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
 * Schedule the event to run daily at a given time (10:00, 19:30, etc).
 *
 * @param  string  $time
 * @return $this
 */',
        'startLine' => 345,
        'endLine' => 353,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'twiceDaily' => 
      array (
        'name' => 'twiceDaily',
        'parameters' => 
        array (
          'first' => 
          array (
            'name' => 'first',
            'default' => 
            array (
              'code' => '1',
              'attributes' => 
              array (
                'startLine' => 362,
                'endLine' => 362,
                'startTokenPos' => 1078,
                'startFilePos' => 7841,
                'endTokenPos' => 1078,
                'endFilePos' => 7841,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 362,
            'endLine' => 362,
            'startColumn' => 32,
            'endColumn' => 41,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'second' => 
          array (
            'name' => 'second',
            'default' => 
            array (
              'code' => '13',
              'attributes' => 
              array (
                'startLine' => 362,
                'endLine' => 362,
                'startTokenPos' => 1085,
                'startFilePos' => 7854,
                'endTokenPos' => 1085,
                'endFilePos' => 7855,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 362,
            'endLine' => 362,
            'startColumn' => 44,
            'endColumn' => 55,
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
 * Schedule the event to run twice daily.
 *
 * @param  int<0, 23>  $first
 * @param  int<0, 23>  $second
 * @return $this
 */',
        'startLine' => 362,
        'endLine' => 365,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'twiceDailyAt' => 
      array (
        'name' => 'twiceDailyAt',
        'parameters' => 
        array (
          'first' => 
          array (
            'name' => 'first',
            'default' => 
            array (
              'code' => '1',
              'attributes' => 
              array (
                'startLine' => 375,
                'endLine' => 375,
                'startTokenPos' => 1120,
                'startFilePos' => 8181,
                'endTokenPos' => 1120,
                'endFilePos' => 8181,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 375,
            'endLine' => 375,
            'startColumn' => 34,
            'endColumn' => 43,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'second' => 
          array (
            'name' => 'second',
            'default' => 
            array (
              'code' => '13',
              'attributes' => 
              array (
                'startLine' => 375,
                'endLine' => 375,
                'startTokenPos' => 1127,
                'startFilePos' => 8194,
                'endTokenPos' => 1127,
                'endFilePos' => 8195,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 375,
            'endLine' => 375,
            'startColumn' => 46,
            'endColumn' => 57,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'offset' => 
          array (
            'name' => 'offset',
            'default' => 
            array (
              'code' => '0',
              'attributes' => 
              array (
                'startLine' => 375,
                'endLine' => 375,
                'startTokenPos' => 1134,
                'startFilePos' => 8208,
                'endTokenPos' => 1134,
                'endFilePos' => 8208,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 375,
            'endLine' => 375,
            'startColumn' => 60,
            'endColumn' => 70,
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
 * Schedule the event to run twice daily at a given offset.
 *
 * @param  int<0, 23>  $first
 * @param  int<0, 23>  $second
 * @param  int<0, 59>  $offset
 * @return $this
 */',
        'startLine' => 375,
        'endLine' => 380,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'hourBasedSchedule' => 
      array (
        'name' => 'hourBasedSchedule',
        'parameters' => 
        array (
          'minutes' => 
          array (
            'name' => 'minutes',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 389,
            'endLine' => 389,
            'startColumn' => 42,
            'endColumn' => 49,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'hours' => 
          array (
            'name' => 'hours',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 389,
            'endLine' => 389,
            'startColumn' => 52,
            'endColumn' => 57,
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
 * Schedule the event to run at the given minutes and hours.
 *
 * @param  array|string|int<0, 59>  $minutes
 * @param  array|string|int<0, 23>  $hours
 * @return $this
 */',
        'startLine' => 389,
        'endLine' => 397,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'weekdays' => 
      array (
        'name' => 'weekdays',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run only on weekdays.
 *
 * @return $this
 */',
        'startLine' => 404,
        'endLine' => 407,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'weekends' => 
      array (
        'name' => 'weekends',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run only on weekends.
 *
 * @return $this
 */',
        'startLine' => 414,
        'endLine' => 417,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'mondays' => 
      array (
        'name' => 'mondays',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run only on Mondays.
 *
 * @return $this
 */',
        'startLine' => 424,
        'endLine' => 427,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'tuesdays' => 
      array (
        'name' => 'tuesdays',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run only on Tuesdays.
 *
 * @return $this
 */',
        'startLine' => 434,
        'endLine' => 437,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'wednesdays' => 
      array (
        'name' => 'wednesdays',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run only on Wednesdays.
 *
 * @return $this
 */',
        'startLine' => 444,
        'endLine' => 447,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'thursdays' => 
      array (
        'name' => 'thursdays',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run only on Thursdays.
 *
 * @return $this
 */',
        'startLine' => 454,
        'endLine' => 457,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'fridays' => 
      array (
        'name' => 'fridays',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run only on Fridays.
 *
 * @return $this
 */',
        'startLine' => 464,
        'endLine' => 467,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'saturdays' => 
      array (
        'name' => 'saturdays',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run only on Saturdays.
 *
 * @return $this
 */',
        'startLine' => 474,
        'endLine' => 477,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'sundays' => 
      array (
        'name' => 'sundays',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run only on Sundays.
 *
 * @return $this
 */',
        'startLine' => 484,
        'endLine' => 487,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'weekly' => 
      array (
        'name' => 'weekly',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run weekly.
 *
 * @return $this
 */',
        'startLine' => 494,
        'endLine' => 499,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'weeklyOn' => 
      array (
        'name' => 'weeklyOn',
        'parameters' => 
        array (
          'dayOfWeek' => 
          array (
            'name' => 'dayOfWeek',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 508,
            'endLine' => 508,
            'startColumn' => 30,
            'endColumn' => 39,
            'parameterIndex' => 0,
            'isOptional' => false,
          ),
          'time' => 
          array (
            'name' => 'time',
            'default' => 
            array (
              'code' => '\'0:0\'',
              'attributes' => 
              array (
                'startLine' => 508,
                'endLine' => 508,
                'startTokenPos' => 1559,
                'startFilePos' => 11032,
                'endTokenPos' => 1559,
                'endFilePos' => 11036,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 508,
            'endLine' => 508,
            'startColumn' => 42,
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
 * Schedule the event to run weekly on a given day and time.
 *
 * @param  mixed  $dayOfWeek
 * @param  string  $time
 * @return $this
 */',
        'startLine' => 508,
        'endLine' => 513,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'monthly' => 
      array (
        'name' => 'monthly',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run monthly.
 *
 * @return $this
 */',
        'startLine' => 520,
        'endLine' => 525,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'monthlyOn' => 
      array (
        'name' => 'monthlyOn',
        'parameters' => 
        array (
          'dayOfMonth' => 
          array (
            'name' => 'dayOfMonth',
            'default' => 
            array (
              'code' => '1',
              'attributes' => 
              array (
                'startLine' => 534,
                'endLine' => 534,
                'startTokenPos' => 1641,
                'startFilePos' => 11601,
                'endTokenPos' => 1641,
                'endFilePos' => 11601,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 534,
            'endLine' => 534,
            'startColumn' => 31,
            'endColumn' => 45,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'time' => 
          array (
            'name' => 'time',
            'default' => 
            array (
              'code' => '\'0:0\'',
              'attributes' => 
              array (
                'startLine' => 534,
                'endLine' => 534,
                'startTokenPos' => 1648,
                'startFilePos' => 11612,
                'endTokenPos' => 1648,
                'endFilePos' => 11616,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 534,
            'endLine' => 534,
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
 * Schedule the event to run monthly on a given day and time.
 *
 * @param  int<1, 31>  $dayOfMonth
 * @param  string  $time
 * @return $this
 */',
        'startLine' => 534,
        'endLine' => 539,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'twiceMonthly' => 
      array (
        'name' => 'twiceMonthly',
        'parameters' => 
        array (
          'first' => 
          array (
            'name' => 'first',
            'default' => 
            array (
              'code' => '1',
              'attributes' => 
              array (
                'startLine' => 549,
                'endLine' => 549,
                'startTokenPos' => 1688,
                'startFilePos' => 11970,
                'endTokenPos' => 1688,
                'endFilePos' => 11970,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 549,
            'endLine' => 549,
            'startColumn' => 34,
            'endColumn' => 43,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'second' => 
          array (
            'name' => 'second',
            'default' => 
            array (
              'code' => '16',
              'attributes' => 
              array (
                'startLine' => 549,
                'endLine' => 549,
                'startTokenPos' => 1695,
                'startFilePos' => 11983,
                'endTokenPos' => 1695,
                'endFilePos' => 11984,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 549,
            'endLine' => 549,
            'startColumn' => 46,
            'endColumn' => 57,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'time' => 
          array (
            'name' => 'time',
            'default' => 
            array (
              'code' => '\'0:0\'',
              'attributes' => 
              array (
                'startLine' => 549,
                'endLine' => 549,
                'startTokenPos' => 1702,
                'startFilePos' => 11995,
                'endTokenPos' => 1702,
                'endFilePos' => 11999,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 549,
            'endLine' => 549,
            'startColumn' => 60,
            'endColumn' => 72,
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
 * Schedule the event to run twice monthly at a given time.
 *
 * @param  int<1, 31>  $first
 * @param  int<1, 31>  $second
 * @param  string  $time
 * @return $this
 */',
        'startLine' => 549,
        'endLine' => 556,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'lastDayOfMonth' => 
      array (
        'name' => 'lastDayOfMonth',
        'parameters' => 
        array (
          'time' => 
          array (
            'name' => 'time',
            'default' => 
            array (
              'code' => '\'0:0\'',
              'attributes' => 
              array (
                'startLine' => 564,
                'endLine' => 564,
                'startTokenPos' => 1753,
                'startFilePos' => 12329,
                'endTokenPos' => 1753,
                'endFilePos' => 12333,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 564,
            'endLine' => 564,
            'startColumn' => 36,
            'endColumn' => 48,
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
 * Schedule the event to run on the last day of the month.
 *
 * @param  string  $time
 * @return $this
 */',
        'startLine' => 564,
        'endLine' => 569,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'daysOfMonth' => 
      array (
        'name' => 'daysOfMonth',
        'parameters' => 
        array (
          'days' => 
          array (
            'name' => 'days',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => true,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 577,
            'endLine' => 577,
            'startColumn' => 33,
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
 * Schedule the event to run on specific days of the month.
 *
 * @param  array<int<1, 31>>|int<1, 31>  ...$days
 * @return $this
 */',
        'startLine' => 577,
        'endLine' => 584,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => true,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'quarterly' => 
      array (
        'name' => 'quarterly',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run quarterly.
 *
 * @return $this
 */',
        'startLine' => 591,
        'endLine' => 597,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'quarterlyOn' => 
      array (
        'name' => 'quarterlyOn',
        'parameters' => 
        array (
          'dayOfQuarter' => 
          array (
            'name' => 'dayOfQuarter',
            'default' => 
            array (
              'code' => '1',
              'attributes' => 
              array (
                'startLine' => 606,
                'endLine' => 606,
                'startTokenPos' => 1935,
                'startFilePos' => 13381,
                'endTokenPos' => 1935,
                'endFilePos' => 13381,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 606,
            'endLine' => 606,
            'startColumn' => 33,
            'endColumn' => 49,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'time' => 
          array (
            'name' => 'time',
            'default' => 
            array (
              'code' => '\'0:0\'',
              'attributes' => 
              array (
                'startLine' => 606,
                'endLine' => 606,
                'startTokenPos' => 1942,
                'startFilePos' => 13392,
                'endTokenPos' => 1942,
                'endFilePos' => 13396,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 606,
            'endLine' => 606,
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
 * Schedule the event to run quarterly on a given day and time.
 *
 * @param  int  $dayOfQuarter
 * @param  string  $time
 * @return $this
 */',
        'startLine' => 606,
        'endLine' => 612,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'yearly' => 
      array (
        'name' => 'yearly',
        'parameters' => 
        array (
        ),
        'returnsReference' => false,
        'returnType' => NULL,
        'attributes' => 
        array (
        ),
        'docComment' => '/**
 * Schedule the event to run yearly.
 *
 * @return $this
 */',
        'startLine' => 619,
        'endLine' => 625,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'yearlyOn' => 
      array (
        'name' => 'yearlyOn',
        'parameters' => 
        array (
          'month' => 
          array (
            'name' => 'month',
            'default' => 
            array (
              'code' => '1',
              'attributes' => 
              array (
                'startLine' => 635,
                'endLine' => 635,
                'startTokenPos' => 2045,
                'startFilePos' => 14099,
                'endTokenPos' => 2045,
                'endFilePos' => 14099,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 635,
            'endLine' => 635,
            'startColumn' => 30,
            'endColumn' => 39,
            'parameterIndex' => 0,
            'isOptional' => true,
          ),
          'dayOfMonth' => 
          array (
            'name' => 'dayOfMonth',
            'default' => 
            array (
              'code' => '1',
              'attributes' => 
              array (
                'startLine' => 635,
                'endLine' => 635,
                'startTokenPos' => 2052,
                'startFilePos' => 14116,
                'endTokenPos' => 2052,
                'endFilePos' => 14116,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 635,
            'endLine' => 635,
            'startColumn' => 42,
            'endColumn' => 56,
            'parameterIndex' => 1,
            'isOptional' => true,
          ),
          'time' => 
          array (
            'name' => 'time',
            'default' => 
            array (
              'code' => '\'0:0\'',
              'attributes' => 
              array (
                'startLine' => 635,
                'endLine' => 635,
                'startTokenPos' => 2059,
                'startFilePos' => 14127,
                'endTokenPos' => 2059,
                'endFilePos' => 14131,
              ),
            ),
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 635,
            'endLine' => 635,
            'startColumn' => 59,
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
 * Schedule the event to run yearly on a given month, day, and time.
 *
 * @param  int  $month
 * @param  int<1, 31>|string  $dayOfMonth
 * @param  string  $time
 * @return $this
 */',
        'startLine' => 635,
        'endLine' => 641,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'days' => 
      array (
        'name' => 'days',
        'parameters' => 
        array (
          'days' => 
          array (
            'name' => 'days',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 649,
            'endLine' => 649,
            'startColumn' => 26,
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
 * Set the days of the week the command should run on.
 *
 * @param  mixed  $days
 * @return $this
 */',
        'startLine' => 649,
        'endLine' => 654,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => true,
        'modifiers' => 1,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'timezone' => 
      array (
        'name' => 'timezone',
        'parameters' => 
        array (
          'timezone' => 
          array (
            'name' => 'timezone',
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
            'startColumn' => 30,
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
 * Set the timezone the date should be evaluated on.
 *
 * @param  \\UnitEnum|\\DateTimeZone|string  $timezone
 * @return $this
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
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'aliasName' => NULL,
      ),
      'spliceIntoPosition' => 
      array (
        'name' => 'spliceIntoPosition',
        'parameters' => 
        array (
          'position' => 
          array (
            'name' => 'position',
            'default' => NULL,
            'type' => NULL,
            'isVariadic' => false,
            'byRef' => false,
            'isPromoted' => false,
            'attributes' => 
            array (
            ),
            'startLine' => 676,
            'endLine' => 676,
            'startColumn' => 43,
            'endColumn' => 51,
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
            'startLine' => 676,
            'endLine' => 676,
            'startColumn' => 54,
            'endColumn' => 59,
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
 * Splice the given value into the given position of the expression.
 *
 * @param  int  $position
 * @param  string|int  $value
 * @return $this
 */',
        'startLine' => 676,
        'endLine' => 683,
        'startColumn' => 5,
        'endColumn' => 5,
        'couldThrow' => false,
        'isClosure' => false,
        'isGenerator' => false,
        'isVariadic' => false,
        'modifiers' => 2,
        'namespace' => 'Illuminate\\Console\\Scheduling',
        'declaringClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'implementingClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
        'currentClassName' => 'Illuminate\\Console\\Scheduling\\ManagesFrequencies',
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