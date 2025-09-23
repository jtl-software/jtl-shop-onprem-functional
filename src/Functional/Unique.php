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
 * Returns an array of unique elements
 *
 * @param Traversable<mixed>|array<mixed> $collection
 * @param callable|null                   $callback
 * @param bool                            $strict
 * @return array<mixed>
 * @no-named-arguments
 */
function unique($collection, ?callable $callback = null, bool $strict = true): array
{
    InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);

    $indexes     = [];
    $aggregation = [];
    foreach ($collection as $key => $element) {
        $index = $element;
        if ($callback) {
            $index = $callback($element, $key, $collection);
        }
        if (!\in_array($index, $indexes, $strict)) {
            $aggregation[$key] = $element;

            $indexes[] = $index;
        }
    }

    return $aggregation;
}
