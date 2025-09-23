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
 * Insert a given value between each element of a collection.
 * Indices are not preserved.
 *
 * @param Traversable<mixed>|array<mixed> $collection
 * @param mixed                           $glue
 * @return array<mixed>
 * @no-named-arguments
 */
function intersperse($collection, mixed $glue): array
{
    InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);

    $aggregation = [];

    foreach ($collection as $element) {
        $aggregation[] = $element;
        $aggregation[] = $glue;
    }

    \array_pop($aggregation);

    return $aggregation;
}
