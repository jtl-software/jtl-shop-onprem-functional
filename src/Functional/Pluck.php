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

use ArrayAccess;
use Functional\Exceptions\InvalidArgumentException;
use Traversable;

/**
 * Extract a property from a collection of objects.
 *
 * @param Traversable|array $collection
 * @param mixed             $propertyName
 * @return array
 * @no-named-arguments
 */
function pluck($collection, mixed $propertyName): array
{
    InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);
    InvalidArgumentException::assertPropertyName($propertyName, __FUNCTION__, 2);

    $aggregation = [];

    foreach ($collection as $index => $element) {
        $value = null;

        if (\is_object($element) && isset($element->{$propertyName})) {
            $value = $element->{$propertyName};
        } elseif ((\is_array($element) || $element instanceof ArrayAccess) && isset($element[$propertyName])) {
            $value = $element[$propertyName];
        }

        $aggregation[$index] = $value;
    }

    return $aggregation;
}
