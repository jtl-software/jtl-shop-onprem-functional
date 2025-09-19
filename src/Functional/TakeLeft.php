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
 * Creates a slice of $collection with $count elements taken from the beginning. If the collection has less than $count
 * elements, the whole collection will be returned as an array.
 *
 * @param Traversable|array $collection
 * @param int               $count
 *
 * @return array
 * @no-named-arguments
 */
function take_left($collection, int $count): array
{
    InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);
    InvalidArgumentException::assertPositiveInteger($count, __FUNCTION__, 2);

    return \array_slice(
        \is_array($collection) ? $collection : \iterator_to_array($collection),
        0,
        $count
    );
}
