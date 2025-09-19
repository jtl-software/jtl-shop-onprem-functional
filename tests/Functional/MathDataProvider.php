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
use stdClass;

class MathDataProvider
{
    public static function injectErrorCollection(): array
    {
        $args = [];
        foreach ([new stdClass(), \stream_context_create(), [], 'str'] as $v) {
            $arg    = [2, $v, '1.5', true, null];
            $args[] = [$arg];
            $args[] = [new ArrayIterator($arg)];
        }
        return $args;
    }

    public static function injectBooleanValues(): array
    {
        return [
            [false, true, 1]
        ];
    }
}
