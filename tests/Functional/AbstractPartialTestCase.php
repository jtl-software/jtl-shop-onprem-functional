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

use function Functional\ratio;

abstract class AbstractPartialTestCase extends AbstractTestCase
{
    protected function ratio(): callable
    {
        return static fn($initial, ...$args) => ratio($args, $initial);
    }
}
