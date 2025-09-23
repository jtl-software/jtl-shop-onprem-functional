<?php

/**
 * @package   Functional-php
 * @author    Lars Strojny <lstrojny@php.net>
 * @copyright 2011-2021 Lars Strojny
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/lstrojny/functional-php
 */

declare(strict_types=1);

namespace Functional\Exceptions;

use ArrayAccess;

/** @internal */
class InvalidArgumentException extends \InvalidArgumentException
{
    /**
     * @throws InvalidArgumentException
     */
    public static function assertCallback(mixed $callback, string $callee, int $parameterPosition): void
    {
        if (\is_callable($callback)) {
            return;
        }
        if (!\is_array($callback) && !\is_string($callback)) {
            throw new self(
                \sprintf(
                    '%s() expected parameter %d to be a valid callback, no array, string, closure or functor given',
                    $callee,
                    $parameterPosition
                )
            );
        }

        $type = \gettype($callback);
        if ($type === 'array') {
            $type     = 'method';
            $callback = \array_values($callback);

            $sep = '::';
            if (\is_object($callback[0])) {
                $callback[0] = \get_class($callback[0]);
                $sep         = '->';
            }

            $callback = \implode($sep, $callback);
        } else {
            $type = 'function';
        }

        throw new self(
            \sprintf(
                "%s() expects parameter %d to be a valid callback, %s '%s' not found or invalid %s name",
                $callee,
                $parameterPosition,
                $type,
                $callback,
                $type
            )
        );
    }

    public static function assertCollection(mixed $collection, string $callee, int $parameterPosition): void
    {
        self::assertCollectionAlike($collection, 'Traversable', $callee, $parameterPosition);
    }

    public static function assertArrayAccess(mixed $collection, string $callee, int $parameterPosition): void
    {
        self::assertCollectionAlike($collection, 'ArrayAccess', $callee, $parameterPosition);
    }

    public static function assertMethodName(mixed $methodName, string $callee, int $parameterPosition): void
    {
        if (!\is_string($methodName)) {
            throw new self(
                \sprintf(
                    '%s() expects parameter %d to be string, %s given',
                    $callee,
                    $parameterPosition,
                    self::getType($methodName)
                )
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function assertPropertyName(mixed $propertyName, string $callee, int $parameterPosition): void
    {
        if (
            !\is_string($propertyName)
            && !\is_int($propertyName)
            && !\is_float($propertyName)
            && $propertyName !== null
        ) {
            throw new self(
                \sprintf(
                    '%s() expects parameter %d to be a valid property name or array index, %s given',
                    $callee,
                    $parameterPosition,
                    self::getType($propertyName)
                )
            );
        }
    }

    public static function assertPositiveInteger(mixed $value, string $callee, int $parameterPosition): void
    {
        if ((string)(int)$value !== (string)$value || $value < 0) {
            $type = self::getType($value);
            $type = $type === 'int' ? 'negative int' : $type;

            throw new self(
                \sprintf(
                    '%s() expects parameter %d to be positive int, %s given',
                    $callee,
                    $parameterPosition,
                    $type
                )
            );
        }
    }

    /**
     * @throws static
     */
    public static function assertValidArrayKey(mixed $key, string $callee): void
    {
        $keyTypes = ['NULL', 'string', 'integer', 'double', 'boolean'];

        $keyType = \gettype($key);

        if (!\in_array($keyType, $keyTypes, true)) {
            throw new self(
                \sprintf(
                    '%s(): callback returned invalid array key of type "%s". Expected %4$s or %3$s',
                    $callee,
                    $keyType,
                    \array_pop($keyTypes),
                    \implode(', ', $keyTypes)
                )
            );
        }
    }

    public static function assertArrayKeyExists(mixed $collection, mixed $key, string $callee): void
    {
        if (!isset($collection[$key])) {
            throw new self(
                \sprintf(
                    '%s(): unknown key "%s"',
                    $callee,
                    $key
                )
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function assertBoolean(mixed $value, string $callee, int $parameterPosition): void
    {
        if (!\is_bool($value)) {
            throw new self(
                \sprintf(
                    '%s() expects parameter %d to be boolean, %s given',
                    $callee,
                    $parameterPosition,
                    self::getType($value)
                )
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function assertInteger(mixed $value, string $callee, int $parameterPosition): void
    {
        if (!\is_int($value)) {
            throw new self(
                \sprintf(
                    '%s() expects parameter %d to be int, %s given',
                    $callee,
                    $parameterPosition,
                    self::getType($value)
                )
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function assertIntegerGreaterThanOrEqual(
        mixed $value,
        int $limit,
        string $callee,
        int $parameterPosition
    ): void {
        if (!\is_int($value) || $value < $limit) {
            throw new self(
                \sprintf(
                    '%s() expects parameter %d to be an int greater than or equal to %d',
                    $callee,
                    $parameterPosition,
                    $limit
                )
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function assertIntegerLessThanOrEqual(
        mixed $value,
        int $limit,
        string $callee,
        int $parameterPosition
    ): void {
        if (!\is_int($value) || $value > $limit) {
            throw new self(
                \sprintf(
                    '%s() expects parameter %d to be an int less than or equal to %d',
                    $callee,
                    $parameterPosition,
                    $limit
                )
            );
        }
    }

    /**
     * @param array<mixed> $args
     */
    public static function assertResolvablePlaceholder(array $args, int $position): void
    {
        if (\count($args) === 0) {
            throw new self(
                \sprintf(
                    'Cannot resolve parameter placeholder at position %d. Parameter stack is empty.',
                    $position
                )
            );
        }
    }

    /**
     * @throws InvalidArgumentException
     */
    private static function assertCollectionAlike(
        mixed $collection,
        string $className,
        string $callee,
        int $parameterPosition
    ): void {
        if (!\is_array($collection) && !$collection instanceof $className) {
            throw new self(
                \sprintf(
                    '%s() expects parameter %d to be array or instance of %s, %s given',
                    $callee,
                    $parameterPosition,
                    $className,
                    self::getType($collection)
                )
            );
        }
    }

    public static function assertNonZeroInteger(mixed $value, string $callee): void
    {
        /** @noinspection TypeUnsafeComparisonInspection */
        if (!\is_int($value) || $value == 0) {
            throw new self(\sprintf('%s expected parameter %d to be non-zero', $callee, $value));
        }
    }

    public static function assertPair(mixed $pair, string $callee, int $position): void
    {
        if (!(\is_array($pair) || $pair instanceof ArrayAccess) || !isset($pair[0], $pair[1])) {
            throw new self(
                \sprintf('%s() expects paramter %d to be a pair (array with two elements)', $callee, $position)
            );
        }
    }

    private static function getType(mixed $value): string
    {
        return \get_debug_type($value);
    }
}
