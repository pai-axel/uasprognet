<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $table = 'career';
    protected $fillable = ['career_title', 'career_image', 'career_content', 'career_available', 'slug'];
}
