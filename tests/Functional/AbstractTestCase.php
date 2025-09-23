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

use DomainException;
use Functional\Exceptions\InvalidArgumentException;
use Iterator;
use PHPUnit\Framework\TestCase;
use Traversable;
use TypeError;

class AbstractTestCase extends TestCase
{
    /** @var array<mixed> */
    protected array $list;

    /** @var Traversable<mixed> */
    protected Traversable $listIterator;

    /** @var array<mixed> */
    protected array $hash;

    /** @var Traversable<mixed> */
    protected Traversable $hashIterator;

    protected function expectArgumentError(string $message): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);
    }

    protected function expectCallableArgumentError(string $fn, int $position, string $actualType = 'string'): void
    {
        $this->expectException(TypeError::class);

        $this->expectExceptionMessageMatches(
            \sprintf(
                '/^%s\(\): Argument \#%d( \(\$callback\))? must be of type \??callable, %s given.*/',
                \preg_quote($fn, '/'),
                $position,
                $actualType
            )
        );
    }

    public function exception(): void
    {
        if (\func_num_args() < 3) {
            throw new DomainException('Callback exception');
        }

        $args = \func_get_args();
        self::assertGreaterThanOrEqual(3, \count($args));
        throw new DomainException(\sprintf('Callback exception: %s', $args[1]));
    }

    protected function sequenceToArray(Iterator $sequence, int $limit): array
    {
        $values = [];
        $sequence->rewind();
        for ($a = 0; $a < $limit; $a++) {
            $values[] = $sequence->current();
            $sequence->next();
        }

        return $values;
    }
}
