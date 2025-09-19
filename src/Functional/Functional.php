<?php

/**
 * @package   Functional-php
 * @author    Lars Strojny <lstrojny@php.net>
 * @copyright 2011-2021 Lars Strojny
 * @license   https://opensource.org/licenses/MIT MIT
 * @link      https://github.com/lstrojny/functional-php
 */

declare(strict_types=1);

namespace Functional;

final class Functional
{
    /**
     * @see ary
     */
    public const ary = '\Functional\ary';

    /**
     * @see average
     */
    public const average = '\Functional\average';

    /**
     * @see but_last
     */
    public const but_last = '\Functional\but_last';

    /**
     * @see capture
     */
    public const capture = '\Functional\capture';

    /**
     * @see compare_object_hash_on
     */
    public const compare_object_hash_on = '\Functional\compare_object_hash_on';

    /**
     * @see compare_on
     */
    public const compare_on = '\Functional\compare_on';

    /**
     * @see compose
     */
    public const compose = '\Functional\compose';

    /**
     * @see concat
     */
    public const concat = '\Functional\concat';

    /**
     * @see const_function
     */
    public const const_function = '\Functional\const_function';

    /**
     * @see contains
     */
    public const contains = '\Functional\contains';

    /**
     * @see converge
     */
    public const converge = '\Functional\converge';

    /**
     * @see curry
     */
    public const curry = '\Functional\curry';

    /**
     * @see curry_n
     */
    public const curry_n = '\Functional\curry_n';

    /**
     * @see difference
     */
    public const difference = '\Functional\difference';

    /**
     * @see drop_first
     */
    public const drop_first = '\Functional\drop_first';

    /**
     * @see drop_last
     */
    public const drop_last = '\Functional\drop_last';

    /**
     * @see each
     */
    public const each = '\Functional\each';

    /**
     * @see entries
     */
    public const entries = '\Functional\entries';

    /**
     * @see equal
     */
    public const equal = '\Functional\equal';

    /**
     * @see error_to_exception
     */
    public const error_to_exception = '\Functional\error_to_exception';

    /**
     * @see every
     */
    public const every = '\Functional\every';

    /**
     * @see \Functional\false
     */
    public const false = '\Functional\false';

    /**
     * @see falsy
     */
    public const falsy = '\Functional\falsy';

    /**
     * @see filter
     */
    public const filter = '\Functional\filter';

    /**
     * @see first
     */
    public const first = '\Functional\first';

    /**
     * @see first_index_of
     */
    public const first_index_of = '\Functional\first_index_of';

    /**
     * @see flat_map
     */
    public const flat_map = '\Functional\flat_map';

    /**
     * @see flatten
     */
    public const flatten = '\Functional\flatten';

    /**
     * @see flip
     */
    public const flip = '\Functional\flip';

    /**
     * @see from_entries
     */
    public const from_entries = '\Functional\from_entries';

    /**
     * @see greater_than
     */
    public const greater_than = '\Functional\greater_than';

    /**
     * @see greater_than_or_equal
     */
    public const greater_than_or_equal = '\Functional\greater_than_or_equal';

    /**
     * @see group
     */
    public const group = '\Functional\group';

    /**
     * @see head
     */
    public const head = '\Functional\head';

    /**
     * @see id
     */
    public const id = '\Functional\id';

    /**
     * @see identical
     */
    public const identical = '\Functional\identical';

    /**
     * @see if_else
     */
    public const if_else = '\Functional\if_else';

    /**
     * @see indexes_of
     */
    public const indexes_of = '\Functional\indexes_of';

    /**
     * @see intersperse
     */
    public const intersperse = '\Functional\intersperse';

    /**
     * @see invoke
     */
    public const invoke = '\Functional\invoke';

    /**
     * @see invoke_first
     */
    public const invoke_first = '\Functional\invoke_first';

    /**
     * @see invoke_if
     */
    public const invoke_if = '\Functional\invoke_if';

    /**
     * @see invoke_last
     */
    public const invoke_last = '\Functional\invoke_last';

    /**
     * @see invoker
     */
    public const invoker = '\Functional\invoker';

    /**
     * @see last
     */
    public const last = '\Functional\last';

    /**
     * @see last_index_of
     */
    public const last_index_of = '\Functional\last_index_of';

    /**
     * @see less_than
     */
    public const less_than = '\Functional\less_than';

    /**
     * @see less_than_or_equal
     */
    public const less_than_or_equal = '\Functional\less_than_or_equal';

    /**
     * @see lexicographic_compare
     */
    public const lexicographic_compare = '\Functional\lexicographic_compare';

    /**
     * @see map
     */
    public const map = '\Functional\map';

    /**
     * @see matching
     * @deprecated
     */
    public const match = '\Functional\match';

    /**
     * @see matching
     */
    public const matching = '\Functional\matching';

    /**
     * @see maximum
     */
    public const maximum = '\Functional\maximum';

    /**
     * @see memoize
     */
    public const memoize = '\Functional\memoize';

    /**
     * @see minimum
     */
    public const minimum = '\Functional\minimum';

    /**
     * @see none
     */
    public const none = '\Functional\none';

    /**
     * @see noop
     */
    public const noop = '\Functional\noop';

    /**
     * @see not
     */
    public const not = '\Functional\not';

    /**
     * @see omit_keys
     */
    public const omit_keys = '\Functional\omit_keys';

    /**
     * @see partial_any
     */
    public const partial_any = '\Functional\partial_any';

    /**
     * @see …
     */
    public const … = '\Functional\…';

    /**
     * @see placeholder
     */
    public const placeholder = '\Functional\placeholder';

    /**
     * @see partial_left
     */
    public const partial_left = '\Functional\partial_left';

    /**
     * @see partial_method
     */
    public const partial_method = '\Functional\partial_method';

    /**
     * @see partial_right
     */
    public const partial_right = '\Functional\partial_right';

    /**
     * @see partition
     */
    public const partition = '\Functional\partition';

    /**
     * @see pick
     */
    public const pick = '\Functional\pick';

    /**
     * @see pluck
     */
    public const pluck = '\Functional\pluck';

    /**
     * @see poll
     */
    public const poll = '\Functional\poll';

    /**
     * @see product
     */
    public const product = '\Functional\product';

    /**
     * @see ratio
     */
    public const ratio = '\Functional\ratio';

    /**
     * @see reduce_left
     */
    public const reduce_left = '\Functional\reduce_left';

    /**
     * @see reduce_right
     */
    public const reduce_right = '\Functional\reduce_right';

    /**
     * @see reindex
     */
    public const reindex = '\Functional\reindex';

    /**
     * @see reject
     */
    public const reject = '\Functional\reject';

    /**
     * @see repeat
     */
    public const repeat = '\Functional\repeat';

    /**
     * @see retry
     */
    public const retry = '\Functional\retry';

    /**
     * @see select
     */
    public const select = '\Functional\select';

    /**
     * @see select_keys
     */
    public const select_keys = '\Functional\select_keys';

    /**
     * @see sequence_constant
     */
    public const sequence_constant = '\Functional\sequence_constant';

    /**
     * @see sequence_exponential
     */
    public const sequence_exponential = '\Functional\sequence_exponential';

    /**
     * @see sequence_linear
     */
    public const sequence_linear = '\Functional\sequence_linear';

    /**
     * @see some
     */
    public const some = '\Functional\some';

    /**
     * @see sort
     */
    public const sort = '\Functional\sort';

    /**
     * @see sum
     */
    public const sum = '\Functional\sum';

    /**
     * @see suppress_error
     */
    public const suppress_error = '\Functional\suppress_error';

    /**
     * @see tail
     */
    public const tail = '\Functional\tail';

    /**
     * @see tail_recursion
     */
    public const tail_recursion = '\Functional\tail_recursion';

    /**
     * @see take_left
     */
    public const take = '\Functional\take_left';

    /**
     * @see take_right
     */
    public const take_right = '\Functional\take_right';

    /**
     * @see tap
     */
    public const tap = '\Functional\tap';

    /**
     * @see \Functional\true
     */
    public const true = '\Functional\true';

    /**
     * @see truthy
     */
    public const truthy = '\Functional\truthy';

    /**
     * @see unique
     */
    public const unique = '\Functional\unique';

    /**
     * @see value_to_key
     */
    public const value_to_key = '\Functional\value_to_key';

    /**
     * @see with
     */
    public const with = '\Functional\with';

    /**
     * @see zip
     */
    public const zip = '\Functional\zip';

    /**
     * @see zip_all
     */
    public const zip_all = '\Functional\zip_all';

    private function __construct()
    {
    }

    private function __clone()
    {
    }
}
