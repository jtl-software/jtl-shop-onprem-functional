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
 * Return a version of the given function where the arguments are provided in reverse order.
 *
 * If one argument is provided, it is passed to the function without change.
 *
 * @param callable $callback the function you want to flip
 * @return callable a flipped version of the given function
 * @no-named-arguments
 */
function flip(callable $callback): callable
{
    return static fn() => $callback(...\array_reverse(\func_get_args()));
}
