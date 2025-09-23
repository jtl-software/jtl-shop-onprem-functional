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
 * Returns an array with the specified keys omitted from the array
 *
 * @param Traversable<mixed>|array<mixed> $collection
 * @param array<mixed>                    $keys
 * @return array<mixed>
 * @no-named-arguments
 */
function omit_keys($collection, array $keys): array
{
    InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);

    if ($collection instanceof Traversable) {
        $array = \iterator_to_array($collection);
    } else {
        $array = $collection;
    }

    return \array_diff_key($array, \array_flip($keys));
}
