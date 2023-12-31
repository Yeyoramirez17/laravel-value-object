<?php
namespace App\ValueObjects\Primitives;

use App\ValueObjects\ValueObject;
use InvalidArgumentException;

class Number extends ValueObject
{
    protected int|float $value;

    protected function __construct( int|float $value )
    {
        $this->value = $value;
        $this->validate();
    }

    public function value(): int|float
    {
        return $this->value;
    }

    protected function validate(): void
    {
        if( ! is_numeric( $this->value() ) )
        {
            throw new InvalidArgumentException('El valor debe ser numérico');
        }
    }

}
