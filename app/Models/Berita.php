<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
    protected $fillable = ['berita_title', 'berita_konten_1', 'berita_konten_2','berita_sampul_1', 'berita_sampul_2', 'berita_sampul_3', 'slug', 'id_kategori_berita', 'id_user'];

    public function kategori_berita()
    {
        return $this->belongsTo(KategoriBerita::class, 'id_kategori_berita');
    }

    public function tag_berita()
    {
        return $this->belongsToMany(TagBerita::class, 'tag_relation_berita', 'id_berita', 'id_tag_berita');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
