<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $table = 'feature';
    protected $fillable = ['feature_title', 'feature_image', 'feature_content', 'slug'];
}
