<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagArtikel extends Model
{
    use HasFactory;

    protected $table = 'tag_artikel';
    protected $fillable = ['tag_artikel_name', 'slug'];

    public function artikel()
    {
        // return $this->belongsToMany(Post::class, 'post_tag', 'id_post', 'id_tag');
        return $this->belongsToMany(Artikel::class, 'tag_relation_artikel', 'id_tag_artikel', 'id_artikel');
    }
}
