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
 * Takes a function and returns a new function that wraps the callback and suppresses the PHP error
 *
 * @param callable $callback
 * @return \Closure
 * @no-named-arguments
 */
function suppress_error(callable $callback): \Closure
{
    return static function (...$arguments) use ($callback) {
        try {
            \set_error_handler(const_function(null));

            return $callback(...$arguments);
        } finally {
            \restore_error_handler();
        }
    };
}
