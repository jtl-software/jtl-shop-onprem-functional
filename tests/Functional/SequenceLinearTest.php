<?php

/**
 * @package   Functional-php
 * @author    Lars Strojny <lstrojny@php.net>
 * @copyright 2011-2021 Lars Strojny
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/lstrojny/functional-php
 */

declare(strict_types=1);

namespace Functional\Tests;

use function Functional\sequence_linear;

class SequenceLinearTest extends AbstractTestCase
{
    public function testLinearIncrements(): void
    {
        $sequence = sequence_linear(0, 1);

        $values = $this->sequenceToArray($sequence, 10);

        self::assertSame([0, 1, 2, 3, 4, 5, 6, 7, 8, 9], $values);
    }

    public function testLinearNegativeIncrements(): void
    {
        $sequence = sequence_linear(0, -1);

        $values = $this->sequenceToArray($sequence, 10);

        self::assertSame([0, -1, -2, -3, -4, -5, -6, -7, -8, -9], $values);
    }

    public function testArgumentMustBePositiveInteger(): void
    {
        $this->expectArgumentError(
            'Functional\sequence_linear() expects parameter 1 to be an int greater than or equal to 0'
        );
        sequence_linear(-1, 1);
    }

    public function testAmountArgumentMustBeInteger(): void
    {
        $this->expectArgumentError(
            'Functional\sequence_linear() expects parameter 2 to be int'
        );
        sequence_linear(0, '1.1');
    }
}
