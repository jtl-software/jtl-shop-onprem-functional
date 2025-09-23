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

/**
 * Returns a function that invokes method `$method` with arguments `$methodArguments` on the object
 *
 * @param string|mixed $methodName
 * @param array<mixed> $arguments
 * @return callable
 * @no-named-arguments
 */
function invoker(mixed $methodName, array $arguments = []): callable
{
    InvalidArgumentException::assertMethodName($methodName, __FUNCTION__, 1);

    return static fn($object) => $object->{$methodName}(...$arguments);
}
