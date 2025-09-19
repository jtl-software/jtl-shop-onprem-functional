<?php

/**
 * @package   Functional-php
 * @author    Lars Strojny <lstrojny@php.net>
 * @copyright 2011-2021 Lars Strojny
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/lstrojny/functional-php
 */

declare(strict_types=1);

namespace Functional\Sequences;

use Functional\Exceptions\InvalidArgumentException;
use Iterator;

/** @internal */
class LinearSequence implements Iterator
{
    private int $value;

    public function __construct(private readonly int $start, private readonly int $amount)
    {
        InvalidArgumentException::assertIntegerGreaterThanOrEqual($start, 0, __METHOD__, 1);
    }

    public function current(): int
    {
        return $this->value;
    }

    public function next(): void
    {
        $this->value += $this->amount;
    }

    public function key(): int
    {
        return 0;
    }

    public function valid(): bool
    {
        return true;
    }

    public function rewind(): void
    {
        $this->value = $this->start;
    }
}
