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
 * Memoizes callbacks and returns their value instead of calling them
 *
 * @param callable|null $callback Callable closure or function. Pass null to reset memory
 * @param array<mixed>  $arguments Arguments
 * @param mixed         $key Optional memoize key to override the auto calculated hash
 * @return mixed
 * @no-named-arguments
 */
function memoize(?callable $callback = null, array $arguments = [], mixed $key = null): mixed
{
    static $storage = [];
    if ($callback === null) {
        $storage = [];

        return null;
    }
    if ($key === null) {
        $key = value_to_key(\array_merge([$callback], $arguments));
    } else {
        $key = value_to_key($key);
    }
    if (!isset($storage[$key]) && !\array_key_exists($key, $storage)) {
        $storage[$key] = $callback(...$arguments);
    }

    return $storage[$key];
}
