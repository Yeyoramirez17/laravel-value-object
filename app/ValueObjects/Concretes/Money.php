<?php

namespace App\ValueObjects\Concretes;

use App\ValueObjects\Primitives\Number;

class Money extends Number
{
    public function __construct( int|float $value )
    {
        parent::__construct( $value );
    }

    public function cents(): int
    {
        return (int) round( $this->value() * 100 );
    }
    public function formatted(): string
    {
        return (new \NumberFormatter(config('app.locale'), \NumberFormatter::CURRENCY ))
            ->formatCurrency( $this->value(), 'COP');
    }

    public function toArray(): array
    {
        return [
            'cents' => $this->cents(),
            'formatted' => $this->formatted(),
        ];
    }
}
