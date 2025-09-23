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

use Functional\Exceptions\InvalidArgumentException;
use Traversable;

/**
 * Recombines arrays by index and applies a callback optionally
 *
 * @param array<mixed>|Traversable<mixed> ...$args One or more callbacks
 * @return array<mixed>
 * @no-named-arguments
 */
function zip(...$args): array
{
    $callback = null;
    if (\is_callable(\end($args))) {
        $callback = \array_pop($args);
    }
    foreach ($args as $position => $arg) {
        InvalidArgumentException::assertCollection($arg, __FUNCTION__, $position + 1);
    }
    $result = [];
    foreach ((array)\reset($args) as $index => $value) {
        $zipped = [];
        foreach ($args as $arg) {
            $zipped[] = $arg[$index] ?? null;
        }
        if ($callback !== null) {
            /** @var callable $callback */
            $zipped = $callback(...$zipped);
        }
        $result[$index] = $zipped;
    }

    return $result;
}
