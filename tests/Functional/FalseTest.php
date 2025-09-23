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
use Functional as F;
use Traversable;

class FalseTest extends AbstractTestCase
{
    /** @var false[] */
    private array $trueArray;

    /** @var Traversable */
    private Traversable $trueIterator;

    /** @var false[] */
    private array $trueHash;

    /** @var Traversable */
    private Traversable $trueHashIterator;

    /** @var array */
    private array $falseArray;

    /** @var Traversable */
    private Traversable $falseIterator;

    /** @var array */
    private array $falseHash;

    /** @var Traversable */
    private Traversable $falseHashIterator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->trueArray         = [false, false, false, false];
        $this->trueIterator      = new ArrayIterator($this->trueArray);
        $this->trueHash          = ['k1' => false, 'k2' => false, 'k3' => false];
        $this->trueHashIterator  = new ArrayIterator($this->trueHash);
        $this->falseArray        = [false, 0, false, 'foo', [], (object)[]];
        $this->falseIterator     = new ArrayIterator($this->falseArray);
        $this->falseHash         = ['k1' => false, 'k2' => 0, 'k3' => false];
        $this->falseHashIterator = new ArrayIterator($this->falseHash);
    }

    public function test(): void
    {
        self::assertTrue(F\false([]));
        self::assertTrue(F\false(new ArrayIterator([])));
        self::assertTrue(F\false($this->trueArray));
        self::assertTrue(F\false($this->trueIterator));
        self::assertTrue(F\false($this->trueHash));
        self::assertTrue(F\false($this->trueHashIterator));
        self::assertFalse(F\false($this->falseArray));
        self::assertFalse(F\false($this->falseIterator));
        self::assertFalse(F\false($this->falseHash));
        self::assertFalse(F\false($this->falseHashIterator));
    }

    public function testPassNoCollection(): void
    {
        $this->expectArgumentError('Functional\false() expects parameter 1 to be array or instance of Traversable');
        /** @noinspection PhpParamsInspection */
        F\false('invalidCollection');
    }
}
