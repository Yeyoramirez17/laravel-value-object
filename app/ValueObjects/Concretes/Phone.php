<?php

namespace App\ValueObjects\Concretes;
use App\ValueObjects\Primitives\Text;
use Illuminate\Support\Stringable;

class Phone extends Text
{
    public function __construct(string|Stringable $value )
    {
        parent::__construct( $value );
    }

    public function validate(): void
    {
        parent::validate();

        if( ! preg_match('/^[+]?[0-9 ]{5,15}$/', $this->value()))
        {
            throw new \InvalidArgumentException('El número de teléfono no es válido.');
        }
    }
}
