<?php
namespace App\ValueObjects\Primitives;

use App\ValueObjects\ValueObject;
use Illuminate\Support\Stringable;
use InvalidArgumentException;

class Boolean extends ValueObject
{
    protected bool $value;
    protected array $trueValues = ['1', 'true', 1, 'on', 'yes'];
    protected array $falseValues = ['0', 'false', 0, 'off', 'no'];

    protected function __construct( bool|int|string $value )
    {
        ! is_bool( $value ) ? $this->handleNonBoolean( $value ) : $this->value = $value;
    }

    public function value(): bool
    {
        return $this->value;
    }

    protected function handleNonBoolean(int|string $value): void
    {
        $string = new Stringable( $value );

        $this->value = match( true )
        {
            $string->contains( $this->trueValues, ignoreCase: true ) => true,
            $string->contains( $this->falseValues, ignoreCase: true ) => false,

            default => throw new InvalidArgumentException('Valor no válido.'),
        };
    }
    public function toString(): string
    {
        return $this->value() ? 'true' : 'false';
    }

}
