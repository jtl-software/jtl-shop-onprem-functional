<?php

/**
 * @package   Functional-php
 * @author    Lars Strojny <lstrojny@php.net>
 * @copyright 2011-2021 Lars Strojny
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/lstrojny/functional-php
 */

declare(strict_types=1);

namespace Functional\Tests;

use Functional\Functional;
use PHPUnit\Framework\TestCase;

class FunctionalTest extends TestCase
{
    public function testAllDefinedConstantsAreValidCallables(): void
    {
        $functionalClass = new \ReflectionClass(Functional::class);
        $functions       = $functionalClass->getConstants();

        foreach ($functions as $function) {
            if ($function === '\\Functional\\match') {
                continue;
            }

            self::assertIsCallable($function);
        }
    }

    public function testShouldHaveDefinedConstantsForAllFunctions(): void
    {
        $functions           = \get_defined_functions();
        $functionalFunctions = \preg_grep('/functional\\\(?!tests)/', $functions['user']);
        $expectedFunctions   = \array_map(
            static fn($function): string => \str_replace('functional\\', '\\Functional\\', $function),
            $functionalFunctions
        );

        $functionalClass = new \ReflectionClass(Functional::class);
        $constants       = $functionalClass->getConstants();

        foreach ($expectedFunctions as $function) {
            self::assertContains($function, $constants);
        }
    }
}
