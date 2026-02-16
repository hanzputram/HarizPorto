<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = ['plan_name', 'price', 'features', 'is_featured'];
}
