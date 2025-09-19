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
 * Returns true if $a is less than or equal to $b.
 * @no-named-arguments
 */
function less_than_or_equal(mixed $b): \Closure
{
    return static fn($a): bool => $a <= $b;
}
