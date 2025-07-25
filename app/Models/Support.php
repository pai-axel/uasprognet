<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $table = 'support';
    protected $fillable = ['client_name', 'client_phone','client_email', 'client_text'];
}
