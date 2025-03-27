<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product'; // Specify the table name if different from the default ('products')

    protected $fillable = [
        'name',
        'price',
        'photo_link',
        'description'
    ];
}
