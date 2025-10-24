<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Default Preset
    |--------------------------------------------------------------------------
    |
    | This option controls the default preset that will be used by PHP Insights
    | to make your code reliable, simple, and clean. However, you can always
    | adjust the `Metrics` and `Insights` below in this configuration file.
    |
    | Supported: "default", "laravel", "symfony", "magento2", "drupal"
    |
    */

    'preset' => 'laravel',

    /*
    |--------------------------------------------------------------------------
    | IDE
    |--------------------------------------------------------------------------
    |
    | This options allow to add hyperlinks in your terminal to quickly open
    | files in your favorite IDE while browsing your PhpInsights report.
    |
    | Supported: "textmate", "macvim", "emacs", "sublime", "phpstorm",
    | "atom", "vscode".
    |
    */

    'ide' => 'vscode',

    /*
    |--------------------------------------------------------------------------
    | Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may adjust all the various `Insights` that will be used by PHP
    | Insights. This is the place to raise or lower the minimum quality
    | score of your codebase, per `Insights` category.
    |
    */

    'exclude' => [
        'vendor',
        'tests/Pest.php',
        'playground.php',
    ],

    'add' => [
        // ExampleMetric::class => [
        //     ExampleInsight::class,
        // ]
    ],

    'remove' => [
        // Remove specific insights that don't apply to this package
        \SlevomatCodingStandard\Sniffs\TypeHints\DisallowMixedTypeHintSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\ForbiddenPublicPropertySniff::class,
        \SlevomatCodingStandard\Sniffs\Functions\FunctionLengthSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\ClassLengthSniff::class,
        \PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff::class,
        \SlevomatCodingStandard\Sniffs\Commenting\DocCommentSpacingSniff::class,
    ],

    'config' => [
        // Complexity
        \PHP_CodeSniffer\Standards\Generic\Sniffs\Metrics\CyclomaticComplexitySniff::class => [
            'absoluteComplexity' => 15,
        ],
        \PHP_CodeSniffer\Standards\Generic\Sniffs\Metrics\NestingLevelSniff::class => [
            'absoluteNestingLevel' => 5,
        ],

        // Architecture
        \SlevomatCodingStandard\Sniffs\Classes\ClassConstantVisibilitySniff::class => [
            'fixable' => true,
        ],
        \SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff::class => [
            'enableObjectTypeHint' => false,
        ],
        \SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSniff::class => [
            'enableObjectTypeHint' => false,
        ],
        \SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff::class => [
            'enableNativeTypeHint' => false,
        ],

        // Style
        \SlevomatCodingStandard\Sniffs\Namespaces\UnusedUsesSniff::class => [
            'searchAnnotations' => true,
        ],
        \PhpCsFixer\Fixer\Import\OrderedImportsFixer::class => [
            'imports_order' => ['class', 'function', 'const'],
            'sort_algorithm' => 'alpha',
        ],

        // Code Quality
        \SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff::class => [
            'ignoreUnusedInClosures' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Requirements
    |--------------------------------------------------------------------------
    |
    | Here you may define a level you want to reach per `Insights` category.
    | When a score is lower than the minimum level defined, then an error
    | code will be returned. This is optional and individually defined.
    |
    */

    'requirements' => [
        'min-quality' => 85,
        'min-complexity' => 85,
        'min-architecture' => 85,
        'min-style' => 90,
        'disable-security-check' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Threads
    |--------------------------------------------------------------------------
    |
    | Here you may adjust how many threads (core) PHPInsights can use to run
    | the analysis. This is optional, should be a positive integer and
    | defaults to the number of CPU cores available in your system.
    |
    */

    'threads' => null,

    /*
    |--------------------------------------------------------------------------
    | Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may adjust the timeout (in seconds) for PHPInsights to run.
    | This is optional, should be a positive integer and defaults to 60.
    |
    */

    'timeout' => 60,
];
