<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagBerita extends Model
{
    use HasFactory;

    protected $table = 'tag_berita';
    protected $fillable = ['tag_berita_name', 'slug'];

    public function berita()
    {
        // return $this->belongsToMany(Post::class, 'post_tag', 'id_post', 'id_tag');
        return $this->belongsToMany(Berita::class, 'tag_relation_berita', 'id_tag_berita', 'id_berita');
    }
}
