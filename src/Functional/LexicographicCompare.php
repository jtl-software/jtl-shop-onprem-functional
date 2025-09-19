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
 * Returns an integer less than, equal to, or greater than zero when
 * $a is respectively less than, equal to, or greater than $b.
 *
 * @param mixed $b
 * @return \Closure
 * @no-named-arguments
 */
function lexicographic_compare($b): \Closure
{
    return static fn($a): int => $a <=> $b;
}
