<?php
namespace App\ValueObjects;
use Illuminate\Contracts\Support\Arrayable;

abstract class ValueObject implements Arrayable
{
    abstract public function value();

    public static function make(mixed ...$values): static
    {
        return new static(...$values);
    }

    public static function from(mixed ...$values): static
    {
        return static::make(...$values);
    }

    /**
     * @param ValueObject $object
     * @return boolean
     */
    public function equals( ValueObject $object): bool
    {
        return $this->value() === $object->value();
    }
    public function noEquals( ValueObject $object ): bool
    {
        return ! $this->equals( $object );
    }
    public function toArray(): array
    {
        return (array) $this->value();
    }
    public function toString(): string
    {
        return (string) $this->value();
    }
    public function __toString(): string
    {
        return $this->toString();
    }
    /**
     * @throws \Exception
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function __set(string $name, mixed $value): void
    {
        throw new \Exception('Los ValueObject son inmutables');
    }
}
