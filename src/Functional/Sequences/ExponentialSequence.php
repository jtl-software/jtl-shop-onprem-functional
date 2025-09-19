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
class ExponentialSequence implements Iterator
{
    private int $start;

    private int $percentage;

    private int $value;

    private int $times;

    public function __construct(int $start, int $percentage)
    {
        InvalidArgumentException::assertIntegerGreaterThanOrEqual($start, 1, __METHOD__, 1);
        InvalidArgumentException::assertIntegerGreaterThanOrEqual($percentage, 1, __METHOD__, 2);
        InvalidArgumentException::assertIntegerLessThanOrEqual($percentage, 100, __METHOD__, 2);

        $this->start      = $start;
        $this->percentage = $percentage;
    }

    public function current(): int
    {
        return $this->value;
    }

    public function next(): void
    {
        $this->value = (int)\round(($this->start * (1 + $this->percentage / 100)) ** $this->times);
        $this->times++;
    }

    public function key(): null
    {
        return null;
    }

    public function valid(): bool
    {
        return true;
    }

    public function rewind(): void
    {
        $this->times = 1;
        $this->value = $this->start;
    }
}
