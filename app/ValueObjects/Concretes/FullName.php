<?php
namespace App\ValueObjects\Concretes;

use App\ValueObjects\Primitives\Text;
use Illuminate\Support\Stringable;
use InvalidArgumentException;

class FullName extends Text
{
    protected function __construct( string|Stringable $value )
    {
        parent::__construct( $value );
        $this->value = ucwords( $this->value );
    }

    public function firstName(): string
    {
        return implode(' ', array_slice( explode(' ', $this->value()), 0, -2) );

    }
    public function lastName(): string
    {
        return implode(' ', array_slice( explode(' ', $this->value()), -2) );

    }
    public function toArray(): array
    {
        return [
            'first_name' => $this->firstName(),
            'last_name'  => $this->lastName(),
        ];
    }

    protected function validate(): void
    {
        parent::validate();

        if (count(explode(' ', $this->value())) < 3)
        {
            throw new InvalidArgumentException('El nombre completo debe contener al menos tres palabras');
        }
    }
}
