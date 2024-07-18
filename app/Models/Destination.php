<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'city',
        'province',
        'duration',
        'number',
        'price',
        'description',
        'image'
    ];
}
