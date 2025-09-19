<?php

/**
 * @package   Functional-php
 * @author    Hugo Sales <hugo@hsal.es>
 * @copyright 2021 Lars Strojny
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/lstrojny/functional-php
 */

declare(strict_types=1);

namespace Functional;

use Functional\Exceptions\InvalidArgumentException;
use Traversable;

/**
 * Inspired by JavaScript’s `Object.fromEntries`,
 * convert an array of key-value pairs into a key-value map
 *
 * @param Traversable|array $collection
 * @return array
 * @no-named-arguments
 * @see entries
 */
function from_entries($collection): array
{
    InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);

    $aggregation = [];
    foreach ($collection as $entry) {
        InvalidArgumentException::assertPair($entry, __FUNCTION__, 1);
        [$key, $value] = $entry;
        InvalidArgumentException::assertValidArrayKey($key, __FUNCTION__);
        $aggregation[$key] = $value;
    }

    return $aggregation;
}
