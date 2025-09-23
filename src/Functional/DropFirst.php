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
 * Drop all elements from a collection until callback returns false
 *
 * @param Traversable<mixed>|array<mixed> $collection
 * @param callable                        $callback
 * @return array<mixed>
 * @no-named-arguments
 */
function drop_first($collection, callable $callback): array
{
    InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);

    $result = [];
    $drop   = true;
    foreach ($collection as $index => $element) {
        if ($drop) {
            if ($callback($element, $index, $collection)) {
                continue;
            }
            $drop = false;
        }
        $result[$index] = $element;
    }

    return $result;
}
