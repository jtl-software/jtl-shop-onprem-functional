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

use function Functional\truthy;

class TruthyTest extends AbstractTestCase
{
    /** @var array<mixed> */
    private array $trueArray;

    private Traversable $trueIterator;

    /** @var array<string, mixed> */
    private array $trueHash;

    private Traversable $trueHashIterator;

    /** @var array<mixed> */
    private array $falseArray;

    private Traversable $falseIterator;

    /** @var array<string, mixed> */
    private array $falseHash;

    private Traversable $falseHashIterator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->trueArray         = [true, true, 'foo', true, true, 1];
        $this->trueIterator      = new ArrayIterator($this->trueArray);
        $this->trueHash          = ['k1' => true, 'k2' => 'foo', 'k3' => true, 'k4' => 1];
        $this->trueHashIterator  = new ArrayIterator($this->trueHash);
        $this->falseArray        = [true, 0, true, null];
        $this->falseIterator     = new ArrayIterator($this->falseArray);
        $this->falseHash         = ['k1' => true, 'k2' => 0, 'k3' => true, 'k4' => null];
        $this->falseHashIterator = new ArrayIterator($this->falseHash);
    }

    public function test(): void
    {
        self::assertTrue(truthy([]));
        self::assertTrue(truthy(new ArrayIterator([])));
        self::assertTrue(truthy($this->trueArray));
        self::assertTrue(truthy($this->trueIterator));
        self::assertTrue(truthy($this->trueHash));
        self::assertTrue(truthy($this->trueHashIterator));
        self::assertFalse(truthy($this->falseArray));
        self::assertFalse(truthy($this->falseIterator));
        self::assertFalse(truthy($this->falseHash));
        self::assertFalse(truthy($this->falseHashIterator));
    }

    public function testPassNoCollection(): void
    {
        $this->expectArgumentError('Functional\truthy() expects parameter 1 to be array or instance of Traversable');
        truthy('invalidCollection');
    }
}
