<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\CodeQuality\Rector\Identical\FlipTypeControlToUseExclusiveTypeRector;
use Rector\CodingStyle\Rector\Encapsed\EncapsedStringsToSprintfRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\Laravel\Set\LaravelSetList;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\Php81\Rector\Property\ReadOnlyPropertyRector;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;

return static function (RectorConfig $rectorConfig): void {
    // Paths to refactor
    $rectorConfig->paths([
        __DIR__.'/src',
        __DIR__.'/config',
        __DIR__.'/tests',
    ]);

    // Skip files/directories
    $rectorConfig->skip([
        __DIR__.'/vendor',
        __DIR__.'/tests/Pest.php',
        __DIR__.'/playground.php',
    ]);

    // Set lists - define which rules to apply
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_82,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::DEAD_CODE,
        SetList::EARLY_RETURN,
        SetList::TYPE_DECLARATION,
        LaravelSetList::LARAVEL_100,
        PHPUnitSetList::PHPUNIT_100,
    ]);

    // Individual rules
    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);
    $rectorConfig->rule(ClassPropertyAssignToConstructorPromotionRector::class);
    $rectorConfig->rule(AddVoidReturnTypeWhereNoReturnRector::class);
    $rectorConfig->rule(RemoveUselessParamTagRector::class);
    $rectorConfig->rule(RemoveUselessReturnTagRector::class);
    $rectorConfig->rule(FlipTypeControlToUseExclusiveTypeRector::class);

    // Skip specific rules that might not be appropriate
    $rectorConfig->skip([
        // Skip readonly properties for now (might break compatibility)
        ReadOnlyPropertyRector::class,

        // Skip sprintf conversion for simple cases
        EncapsedStringsToSprintfRector::class,

        // Skip some Laravel-specific rules that might not apply to packages
        \Rector\Laravel\Rector\Class_\AddExtendsAnnotationToModelQueryBuilderRector::class,
        \Rector\Laravel\Rector\Class_\PropertyDeferToDeferrableProviderToRector::class,
    ]);

    // Configure specific rules
    $rectorConfig->ruleWithConfiguration(
        ClassPropertyAssignToConstructorPromotionRector::class,
        [
            // Only promote properties that are assigned in constructor
            ClassPropertyAssignToConstructorPromotionRector::INLINE_PUBLIC => false,
        ]
    );

    // Import names
    $rectorConfig->importNames();
    $rectorConfig->importShortClasses();

    // Parallel processing
    $rectorConfig->parallel();

    // Cache directory
    $rectorConfig->cacheDirectory(__DIR__.'/var/cache/rector');

    // File extensions
    $rectorConfig->fileExtensions(['php']);

    // Bootstrap files
    $rectorConfig->bootstrapFiles([
        __DIR__.'/vendor/autoload.php',
    ]);
};
