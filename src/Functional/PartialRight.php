<?php

/**
 * @package   Functional-php
 * @author    Lars Strojny <lstrojny@php.net>
 * @copyright 2011-2021 Lars Strojny
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/lstrojny/functional-php
 */

declare(strict_types=1);

namespace Functional;

/**
 * Return a new function with the arguments partially applied starting from the right
 *
 * @param callable     $callback
 * @param array<mixed> ...$arguments
 * @return callable
 * @no-named-arguments
 */
function partial_right(callable $callback, ...$arguments): callable
{
    return static fn(...$innerArguments) => $callback(...\array_merge($innerArguments, $arguments));
}
