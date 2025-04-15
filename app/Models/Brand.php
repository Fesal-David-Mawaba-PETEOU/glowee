<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;

class Brand extends Model
{
    protected $fillable = [
        'name',        
        'slug',      
        'image',
        'is_active',
    ];
}