<?php

namespace App\ValueObjects\Concretes;

use App\ValueObjects\Primitives\Text;
use Illuminate\Support\Stringable;

class Url extends Text
{
    public function __construct( string|Stringable $value )
    {
        parent::__construct( $value );
    }

    public function protocol(): string
    {
        return parse_url( $this->value(), PHP_URL_SCHEME );
    }
    public function domain(): string
    {
        return parse_url( $this->value(), PHP_URL_HOST );
    }
    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'protocol' => $this->protocol(),
            'domain' => $this->domain(),
        ];
    }

    public function validate(): void
    {
        parent::validate();

        if( ! filter_var( $this->value(), FILTER_VALIDATE_URL ))
        {
            throw new \InvalidArgumentException('La URL no es valida');
        }
    }

}
