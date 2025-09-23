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
 * Takes a nested combination of collections and returns their contents as a single, flat array.
 * Does not preserve indexes.
 *
 * @param Traversable<mixed>|array<mixed> $collection
 * @return array<mixed>
 * @no-named-arguments
 */
function flatten($collection): array
{
    InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);

    $stack  = [$collection];
    $result = [];

    while (!empty($stack)) {
        $item = \array_shift($stack);

        if (\is_iterable($item)) {
            foreach ($item as $element) {
                \array_unshift($stack, $element);
            }
        } else {
            \array_unshift($result, $item);
        }
    }

    return $result;
}
