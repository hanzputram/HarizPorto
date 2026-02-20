<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoCard extends Model
{
    protected $fillable = ['label', 'value', 'order'];
}
