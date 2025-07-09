<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';
    protected $fillable = ['artikel_title', 'artikel_sampul', 'artikel_konten','slug', 'id_user'];

    public function tag_artikel()
    {
        return $this->belongsToMany(TagArtikel::class, 'tag_relation_artikel', 'id_artikel', 'id_tag_artikel');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
