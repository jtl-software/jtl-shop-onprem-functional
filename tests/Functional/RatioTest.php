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

use ArrayIterator;
use Traversable;

use function Functional\ratio;

class RatioTest extends AbstractTestCase
{
    /** @var array<mixed> */
    private array $intArray;

    private Traversable $intIterator;

    /** @var array<mixed> */
    private array $floatArray;

    private Traversable $floatIterator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->intArray      = [1 => 1, 2, 'foo' => 3, 4];
        $this->intIterator   = new ArrayIterator($this->intArray);
        $this->floatArray    = ['foo' => 1.5, 1.1, 1];
        $this->floatIterator = new ArrayIterator($this->floatArray);
    }

    public function test(): void
    {
        self::assertSame(1, ratio([1]));
        self::assertSame(1, ratio(new ArrayIterator([1])));
        self::assertSame(1, ratio($this->intArray, 24));
        self::assertSame(1, ratio($this->intIterator, 24));
        self::assertEqualsWithDelta(-1, ratio($this->floatArray, -1.65), 0.01);
        self::assertEqualsWithDelta(-1, ratio($this->floatIterator, -1.65), 0.01);
    }

    /** @dataProvider \Functional\Tests\MathDataProvider::injectErrorCollection */
    public function testElementsOfWrongTypeAreIgnored($collection): void
    {
        self::assertEqualsWithDelta(0.333, ratio($collection), 0.001);
    }

    public function testPassNoCollection(): void
    {
        $this->expectArgumentError('Functional\ratio() expects parameter 1 to be array or instance of Traversable');
        /** @noinspection PhpParamsInspection */
        ratio('invalidCollection');
    }
}
