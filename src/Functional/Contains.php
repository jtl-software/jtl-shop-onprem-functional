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
 * Returns true if the collection contains the given value. If the third parameter is
 * true values will be compared in strict mode
 *
 * @param Traversable<mixed>|array<mixed> $collection
 * @no-named-arguments
 */
function contains($collection, mixed $value, bool $strict = true): bool
{
    InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);

    foreach ($collection as $element) {
        /** @noinspection TypeUnsafeComparisonInspection */
        if ($value === $element || (!$strict && $value == $element)) {
            return true;
        }
    }

    return false;
}
