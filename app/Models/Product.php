<?php

namespace App\Models;

use App\Casts\File;
use App\Casts\Money;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => Money::class,
        'image' => File::class
    ];
}
