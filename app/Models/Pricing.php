<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = ['plan_name', 'price', 'price_subtitle', 'features', 'benefits', 'is_featured'];
}
