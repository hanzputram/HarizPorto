<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capability extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'module_number',
        'order'
    ];
}
