<?php

namespace App\ValueObjects\Concretes;
use App\ValueObjects\Primitives\Text;

class Email extends Text
{
    public function __construct( string $value )
    {
        parent::__construct( $value );
        $this->value = strtolower( $value );
    }

    public function username(): string
    {
        return explode('@', $this->value())[0];
    }
    public function domain(): string
    {
        return explode('@', $this->value())[1];
    }
    protected function validate(): void
    {
        parent::validate();

        if( ! filter_var( $this->value(), FILTER_VALIDATE_EMAIL) )
        {
            throw new \InvalidArgumentException('El valor no es un correoelectrónico');
        }
    }
    public function toArray(): array
    {
        return [
            'username' => $this->username(),
            'domain' => $this->domain(),
        ];
    }
}
