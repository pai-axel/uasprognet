<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    protected $table = 'seo';
    protected $fillable = ['domain_canonical', 'meta_title','meta_description', 'meta_keywords', 'meta_language', 'meta_author', 'og_image','slug'];
}
