<?php

namespace App\Models;

use App\Casts\Email;
use App\Casts\Name;
use App\Casts\Phone;
use App\Casts\Url;
use App\ValueObjects\Concretes\FullName;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $casts = [
        'name' => Name::class,
        'lastname' => Name::class,
        'email' => Email::class,
        'website' => Url::class,
        'phone' => Phone::class,
    ];

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => FullName::from(
                $this->name->value() . ' ' . $this->lastname->value()
            )
        );
    }
}
