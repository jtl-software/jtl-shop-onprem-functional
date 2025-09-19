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
 * Returns true if $a is equal to $b, and they are of the same type.
 *
 * @param mixed $b
 * @return callable
 * @no-named-arguments
 */
function identical(mixed $b): callable
{
    return static fn(mixed $a): bool => $a === $b;
}
