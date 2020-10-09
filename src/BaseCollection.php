<?php

namespace Duroth\Magic;

class BaseCollection extends \ArrayObject
{
    protected static $allowedClass = '';

    public function __construct($input = array(), $flags = 0, $iterator_class = "ArrayIterator")
    {
        $this->assertAllValid($input);
        parent::__construct($input, $flags, $iterator_class);
    }

    public function append($value)
    {
        $this->assertValid($value);
        parent::append($value);
    }

    public function exchangeArray($input)
    {
        $this->assertAllValid($input);
        parent::exchangeArray($input);
    }

    public function offsetSet($index, $newval)
    {
        $this->assertValid($newval);
        parent::offsetSet($index, $newval);
    }

    protected function assertAllValid(array $values): void
    {
        array_map([$this, 'assertValid'], $values);
    }

    protected function assertValid($value): void
    {
        if (!is_object($value)) {
            throw new \UnexpectedValueException(sprintf('Value must be an object. "%s" given.', gettype($value)));
        }
        if (!is_a($value, static::$allowedClass)) {
            throw new \UnexpectedValueException(sprintf('Value must be an instance of "%s". "%s" given.', static::$allowedClass, get_class($value)));
        }
    }
}